<?php

namespace app\controllers\admin;

use app\classes\Flash;
use app\classes\Validate;
use app\models\activerecord\FindBy;
use app\models\activerecord\Update;
use app\models\activerecord\FindAll;
use app\interfaces\ControllerInterface;
use app\models\activerecord\Delete;
use app\models\Product as ProductModel;

class Product implements ControllerInterface
{
    public string $view = '';
    public array $data = [];
    public string $master = 'admin/index.php';

    public function index(array $args)
    {
        $products = (new ProductModel)->execute(
            new FindAll()
        );
        
        $this->view = $this->view ?: 'admin/product/index.php';
        $this->data = [
            'title'     => 'Lista de produtos',
            'products'  => $products
        ];
    }

    public function edit(array $args)
    {
        $product = (new ProductModel)->execute(
            new FindBy(
                field: 'id',
                value: $args[0],
                fields: 'id, descricao, categoria'
            )
        );

        $this->data = [
            'title'     => 'Editar produto',
            'product'   => $product,
        ];
        $this->view = 'admin/product/edit.php';
    }

    public function show(array $args)
    {
        $product = (new ProductModel)->execute(
            new FindBy(
                field:'id',
                value: $args[0],
                fields:'descricao, categoria'
            )
        );

        $this->view = 'admin/product/product.php';
        $this->data = [
            'title' => 'Visualizar produto',
            'product'   => $product
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

        $product = (new ProductModel);
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

    public function store()
    {

    }

    public function delete(array $args)
    {
        (new ProductModel)->execute(
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