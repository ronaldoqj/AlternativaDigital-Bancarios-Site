<?php
namespace App\_Helpers;

class LoadImage
{  
   private array $loadImg = [];

    /**
     * Load Image
     * 
     * Carrega as informações da imagem
     * vindo do request
     *
     * @param  Object $imgRequest
     * @return Array   []           Contendo as informações da imagem
     */
    public function loadImg($imgRequest): array
    {
        $file = $imgRequest;
        $this->loadImg['File'] = $file;
        $this->loadImg['MimeType'] = $file->getMimeType();
        $this->loadImg['OriginalName'] = $file->getClientOriginalName();
        $this->loadImg['OriginalExtension'] = $file->getClientOriginalExtension();
        $this->loadImg['RealPath'] = $file->getRealPath();
        $this->loadImg['Size'] = $file->getSize();
        //$file->move($caminhoSistema, $img->nomearquivo_img);

        return $this->loadImg;
    }
}
