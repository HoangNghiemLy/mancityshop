<?php 
class mCart {
    public $items;
    public $quantity;
    public $total_price;
    

    function __construct($items = array(), $quantity = 0, $total_price = 0)
    {
        $this->items = $items;
        $this->quantity = $quantity;
        $this->total_price = $total_price;
    }


    function addProduct($id ,$quantity) {
        // $id = $_GET['idpro'];
        $mProduct = new mProduct();

        $cond = " id = $id";
        $tmp = $mProduct->fetch_all($cond);
        $product = current($tmp);

        $item = [
            'product_id' => $product['id'],
            'name' => $product['name'],
            'featured_img' => $product['featured_img'],
            'quantity' => $quantity,
            'price' => $product['sale_price']
        ];


        $this->addItem($item);
    }

    function addItem($item) {
        if(!array_key_exists($item['product_id'], $this->items)) {
            $this->items[$item['product_id']] = [
                'name' => $item['name'],
                'featured_img' => $item['featured_img'],
                'quantity' => $item['quantity'],
                'price' => $item['price']
            ];
        }
        else {
            $this->items[$item['product_id']]['quantity'] += $item['quantity'];
        }

        $this->quantity += $item['quantity'];
        $this->total_price += $item['quantity'] * $item['price'];
    }

    function deleteItem($id) {
        if(array_key_exists($id, $this->items)) {
            unset($this->items[$id]);
        }
        $this->quantity = 0;
        $this->total_price = 0;

        foreach($this->items as $key => $val) {
            $this->quantity += $val['quantity'];
            $this->total_price += $val['price'] * $val['quantity'];
        }

    }


}


?>