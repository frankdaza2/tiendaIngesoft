<?php require "medoo.min.php";

/**
* Class Product.
* Author: Frank Edward Daza González.
*/
class Product {

	private $id_tipoproducto;
	private $descripcion_producto;
	private $precio_producto;
	private $ref_producto;
	private $presentacion_producto;
	private $db;
	
	function __construct($id, $descripcion, $precio, $ref, $presentacion) {
		$this->id_tipoproducto 				= $id;
		$this->descripcion_producto 	= $descripcion;
		$this->precio_producto 				= $precio;
		$this->ref_producto 					= $ref;
		$this->presentacion_producto 	= $presentacion;
		$this->db = new medoo();
	}

	/**
	* @return bool true si el ingreso del producto fue correcto, 
	* false de lo contrario.
	*/
	public function addProduct() {
		if ($this->db->insert("productos", [
			"id_tipoproducto" 			=> $this->id_tipoproducto,
			"descripcion_producto" 	=> $this->descripcion_producto,
			"precio_producto" 			=> $this->precio_producto,
			"ref_producto" 					=> $this->ref_producto,
			"presentacion_producto" => $this->presentacion_producto
		])) {
			return true;
		}
		else return false;
	}

	/**
	* @param $id ID del producto a eliminar.
	* @return bool true si se elimina el producto,
	* false de lo contrario.
	*/
	public function deleteProduct($id) {
		if ($this->db->delete("productos", ["id_producto" => $id])) {
			return true;
		}
		else return false;
	}

	/**
	* @param $id ID del producto a actualizar.
	* @return bool true si se actualiza el producto,
	* false de lo contrario.
	*/
	public function updateProduct($id) {
		if ($this->db->update("productos", [
			"id_tipoproducto" 			=> $this->id_tipoproducto,
			"descripcion_producto" 	=> $this->descripcion_producto,
			"precio_producto" 			=> $this->precio_producto,
			"ref_producto" 					=> $this->ref_producto,
			"presentacion_producto" => $this->presentacion_producto
		], [
			"id_producto" => $id
		])) {
			return true;
		}
		else return false;
	}
}