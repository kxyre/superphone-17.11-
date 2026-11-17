<?php
    class Venda {
        //atributos
        private $id;
        private $data;
        private $valorTotal;
        private $formaPagamento;
        private $comprador;

        //metodos de encapsulamento (getters setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function getData() {
            return $this->data;
        }

        public function setData($data){
            $this->data = $data;
        }

        public function getValorTotal() {
            return $this->valorTotal;
        }

        public function setValorTotal($valorTotal){
            $this->valorTotal = $valorTotal;
        }

        public function getFormaPagamento() {
        return $this->formaPagamento;
        }

        public function setFormaPagamento($formaPagamento) {
        $this->formaPagamento = $formaPagamento;
        }

        public function getComprador() {
            return $this->comprador;
        }

        public function setComprador($comprador){
            $this->comprador = $comprador;
        }
    }

?>