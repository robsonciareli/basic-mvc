<?php

namespace app\controllers\admin;

use app\classes\Flash;
use app\classes\Validate;
use app\models\activerecord\Update;
use app\models\activerecord\FindAll;
use app\interfaces\ControllerInterface;
use app\models\activerecord\Delete;
use app\models\activerecord\FindById;
use app\models\activerecord\Insert;
use app\models\Product as ProductModel;

class Product implements ControllerInterface
{
    public string $view = '';
    public array $data = [];
    public string $master = 'admin/index.php';
    public string $baseView = '/admin/product';
    

    public function __construct(private ?ProductModel $productModel = (new ProductModel))
    {
    }

    public function index(array $args)
    {
        $products = $this->productModel->execute(
            new FindAll()
        );
        
        $this->data = [
            'title'     => 'Lista de produtos',
            'products'  => $products,
            'add'       => '/admin/product/addProduct',
            'baseView'  => $this->baseView,
        ];
        $this->view = $this->view ?: 'admin/product/index.php';

    }

    public function edit(array $args)
    {
        $product = $this->productModel->execute(
            new FindById(
                field: 'id',
                value: $args[0],
                fields: 'id, descricao, categoria',
                pdoFetchClass: get_class($this->productModel)
            )
        );

        $this->data = [
            'title'     => 'Editar produto',
            'product'   => $product,
            'baseView'  => $this->baseView,
        ];
        $this->view = 'admin/product/edit.php';
    }

    public function show(array $args)
    {
        $product = $this->productModel->execute(
            new FindById(
                field:'id',
                value: $args[0],
                fields:'descricao, categoria',
                pdoFetchClass: get_class($this->productModel)
            )
        );

        $this->view = 'admin/product/product.php';
        $this->data = [
            'title' => 'Visualizar produto',
            'product'   => $product,
            'baseView'  => $this->baseView,
        ];
    }

    public function update(array $args)
    {
        $validate = new Validate();
        $validate->handle([
            'id'        => [REQUIRED],
            'descricao' => [REQUIRED],
            'categoria' => [REQUIRED]
        ]);

        if($validate->errors){
            return redirect("/admin/product/edit/{$validate->data['id']}");
        }

        $product = $this->productModel;
        $product->descricao = $validate->data['descricao'];
        $product->categoria = $validate->data['categoria'];

        $created = $product->execute(
            new Update(field:'id', value: $validate->data['id'])
        );

        if($created){
            Flash::set('created', "O produto {$product->descricao} foi alterado com sucesso!", "success");
            return redirect("/admin/product");
        } else {
            Flash::set('erro', "Não ocorreu alteração!", "danger");
            return redirect("/admin/product/edit/{$validate->data['id']}");
        }
        
    }

    public function addProduct()
    {
        $this->view = '/admin/product/addProduct.php';
        $this->data = [
            'title' => 'Adicionar Produto',
            'baseView'  => $this->baseView,
        ];
    }

    public function store()
    {
        $validate = new Validate();
        $validate->handle([
            'descricao' => [REQUIRED],
            'categoria' => [REQUIRED]
        ]);

        if($validate->errors){
            return redirect("/admin/product/addProduct");
        }

        $product = $this->productModel;
        $product->descricao = $validate->data['descricao'];
        $product->categoria = $validate->data['categoria'];
        
        $created = $product->execute(
            new Insert
        );

        Flash::set('created', "O produto {$validate->data['descricao']} foi inserido com sucesso!", 'success');

        return redirect('/admin/product/');
    }

    public function delete(array $args)
    {
        $this->productModel->execute(
            new Delete(
                field:'id',
                value: $args[0]
            )
        );

        Flash::set('excluido','Item excluído com sucesso', 'success');

        return redirect('/admin/product');
    }

    public function destroy(array $args)
    {

    }

}