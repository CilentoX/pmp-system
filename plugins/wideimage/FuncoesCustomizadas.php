<?php


class FuncoesCustomizadas  {

    private $imagemOriginal, $nomeImagem, $imagem, $diretorio, $prefixo = '', $ext;

    
    public function __construct() {        
        require_once 'WideImage.php';
    }
    
    
    public function SetDados($imagem, $diretorio, $prefixo = '') {
        $this->imagemOriginal = $imagem;
        $this->diretorio = $diretorio;
        $this->imagem = WideImage::load($this->imagemOriginal['tmp_name']);
        $this->prefixo = $prefixo;
        $this->GerarNome();
    }

    /*
     * Metodo que Gera um nome unico para cada imagem  
     * parameto = String
     */

    private function GerarNome() {
        $this->nomeImagem = md5(uniqid(rand(), true)) . '.' . $this->GetExtensao();
    }

    /* Metodo que recupera a extensao da imagem original */

    private function GetExtensao() {
        $extensao = strtolower(pathinfo($this->imagemOriginal['name'], PATHINFO_EXTENSION));
        if($this->ExtensaoValido($extensao)){
            $this->ext = $extensao;
            return $extensao;
        }else{
            die('Tipo de arquivo inválido.');
        }
    }
    
    
    /* Valida o tipo de arquivo */
    private function ExtensaoValido($extensao, $permitidos = array('jpg','jpeg','png','gif')){
        return in_array($extensao, $permitidos);
    }
    

    /* Responsavel por retornar o nome gerado */
    public function GetNome() {
        return $this->nomeImagem;
    }

    /*
     * Metodo para setar o nome da imagem manual 
     * parametro = String
     */

    public function SetNomeImagem($nomeImagem) {
        $this->nomeImagem = $nomeImagem;
    }

    /* Metodo que verifica se exite o diretorio */

    private function ExisteDiretorio($dir = null) {
        if (file_exists($dir == null ? $this->diretorio : $dir)) {
            return true;
        }
        return false;
    }

    /* Metodo responsavel por criar a pasta e atribuir as devidas permissoes */

    private function CriarDiretorio($dir) {
        if(!file_exists($dir)){
            if (!mkdir($dir)) { /* Resalta em windows nao funciona atribuir permissoes mkdir($this->diretorio, 0770) */
                die('Você nao tem permissão para criar esse diretório.');
            }
        }            
    }
    
    /*Verifica se existe subpastas no diretorio informado*/
    private function VerificaSubpastas(){
        $dir = explode('/', $this->diretorio);
        $aux = '';
        if (count($dir) > 0) {
            foreach ($dir as $d) {
                $aux .= $d.'/';
                $this->CriarDiretorio($aux);
            }
        } else {
            $this->CriarDiretorio($this->diretorio);
        }
    }
        


    /* Metodo que redimesiona imagem utilizando o WIDEIMAGE */

    public function Redimensionar($largura = null, $altura = null, $qualidade = 100) {
        if (!$this->ExisteDiretorio()) {
            $this->VerificaSubpastas();
        }
        $redimensionada = $this->imagem->resize($largura, $altura);
        if($this->ext == 'jpg' || $this->ext == 'jpeg'){
            $redimensionada->saveToFile($this->diretorio . $this->GetNome(), $qualidade);
        }else if($this->ext == 'png'){
            $redimensionada->saveToFile($this->diretorio . $this->GetNome(), 6);
        }else{
            $redimensionada->saveToFile($this->diretorio . $this->GetNome());
        }
        
        $redimensionada->destroy();
        $this->imagem->destroy();
    }
    
    
    
    
    /* METODO PARA CORTAR A IMAGEM */
    public function Cortar($largura = 150, $altura = 150){
        if (!$this->ExisteDiretorio()) {
            $this->VerificaSubpastas();
        }
        
        $redimensionada = $this->imagem->resize($largura, $altura,'outside');
        $cropped        = $redimensionada->crop('center', 'center', $largura, $altura);        
        $cropped->saveToFile($this->diretorio . $this->GetNome());
        
        $redimensionada->destroy();
        $cropped->destroy();
        $this->imagem->destroy();
    }
    
    
    
    /* TAMANHOS FIXO */
    public function TamanhoFixo($largura, $altura){
        if(!$this->ExisteDiretorio()){
            $this->VerificaSubpastas();
        }
        
        $fundo = WideImage::load('imagens/bg_transp.png');
        $fundoCrop = $fundo->crop('center', 'center', $largura, $altura); 
        
        if($this->imagem->getWidth() > $this->imagem->getHeight()){
            $redimensionada = $this->imagem->resize($largura, null);
        }else{
            $redimensionada = $this->imagem->resize(null, $altura);
        }
        
        $nova = $fundoCrop->merge($redimensionada, 'center', 'center');
        $nova->saveToFile($this->diretorio . str_replace(array('.jpg','.jpeg','.gif'), '.png', $this->GetNome()));
        
        $fundo->destroy();
        $fundoCrop->destroy();
        $redimensionada->destroy();
        $nova->destroy();
    }
    

    /* Exclui a imagem do diretorio */

    public function ExcluirImagem($diretorio = null, $nomeImagem = null) {
        if (file_exists($diretorio . $nomeImagem) && is_file($diretorio.$nomeImagem)) {
            unlink($diretorio . $nomeImagem) or die('Erro ao excluir imagem, verifique as permissões da pasta.');
        }
    }

}
