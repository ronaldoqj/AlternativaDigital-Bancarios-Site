<?php
namespace App\Services;
use Illuminate\Database\Eloquent\Model;
use Validator;
use Illuminate\Support\Str;
use App\Models\File;
use DateTime;

class Upload
{
    public string $path = 'files';
    public ?int $category = null;
    public ?string $name = null;
    public ?string $fileName = null;
    public ?string $creditfile = null;
    public ?string $description = null;
    public ?string $alternativeText = null;
    public array $return = [];


    /**
     * AddFiles on table files and make upload on files.
     *
     * @param  file $file
     * @param  string $path
     * @param  string $fileName
     * @return mixed
     */
    public function addFile($file): Array
    {
        if (! $file) {
            return [];
        }
        // $adjusted = Str::start('/texto/texto', '/'); // dump( $adjusted );
        // $trim = trim('  Laravel  '); //dump($trim);
        // $slug = Str::slug('Laravel 5 Framework', '-'); //dump($slug);
        // $limite = substr("The quick brown fox jumps over the lazy dog",0,117); //dump($limite);
        //Display File Name
        $fileOriginalName = $file->getClientOriginalName(); 
        
        //Display File Extension
        $fileOriginalExtension = $file->getClientOriginalExtension();
        
        //Display File Real Path
        $fileRealPath = $file->getRealPath();
        
        //Display File Size
        $fileSize = $file->getSize();
        
        //Display File Extension
        $fileExtension = '';

        //Display File Mime Type
        $fileMimeType = $file->getMimeType();
        
        // Insere o caracter "/" no inicio da string caso não tenha
        //$pathDestination = Str::start($path, '/');
        
        $pathDestination = $this->path;

        $startWithBar = Str::startsWith($pathDestination, '/');
        if ($startWithBar) {
            $pathDestination =  substr($pathDestination, 1);
        }

        //dd($pathDestination);
        // Reduz o tamanho do nome do arquivo caso passe de 120 caracteres        
        $fileNameToRegister = $this->fileName == '' ? $fileOriginalName : $this->fileName;
        $fileNameToRegister = str_replace(' ', '_', $fileNameToRegister);
        $fileExtension = '.' . ltrim( substr( $fileNameToRegister, strrpos( $fileNameToRegister, '.' ) ), '.' );
        $nameFileWidouthExtension = substr($fileNameToRegister, 0, -strlen($fileExtension));
        $dt = new DateTime();
        $fileNameToRegister = substr($nameFileWidouthExtension, 0, 120 - strlen($fileExtension) - (strlen($dt->format('Ymd_His-u')) + 1)) . '-' . $dt->format('Ymd_His-u') . $fileExtension;
        

        // Caso consiga mover o arquivo registra no banco de dados e retorna os dados do arquivo
        if ( $file->move($pathDestination, $fileNameToRegister) )
        {
            $modelFile = new File();
            $modelFile->category = $this->category;
            $modelFile->pathfile = $pathDestination;
            $modelFile->name = $this->name;
            $modelFile->namefile = $fileNameToRegister;
            $modelFile->creditfile = $this->creditfile;
            $modelFile->mimetype = $fileMimeType;
            $modelFile->size = $fileSize;
            $modelFile->extension = $fileExtension;

            $modelFile->description = $this->description;
            $modelFile->alternativeText = $this->alternativeText;
            
            $modelFile->save();

            $this->return = [
                'FileId' => $modelFile->id,
                'FileName' => $fileNameToRegister,
                'FilePath' => $pathDestination,
                'FileSize' => $fileSize,
                'FileMimeType' => $fileMimeType,
                'FileExtension' => $fileExtension
            ];
        }
        
        
        return $this->return;
    }

}
