<?php 
namespace AndreGasparin\HCache;

class HCache{
	protected $folder;
	protected $timeout;
	protected $ext;
	protected $criado;

	public function __construct($timeout = 10, $folder = 'tmp/hcache', $ext = 'chs'){
		$this->timeout = $timeout;
		$this->folder = $folder;
		$this->ext  = $ext;
        }

	public function caminhoArquivo($chave){
		return sprintf('%s/%s.%s', $this->folder, md5($chave), $this->ext);
	}

	public function existe($chave){

		$arquivo = $this->caminhoArquivo($chave);
		if(file_exists($arquivo)){
			$filemtime = filemtime($arquivo);

			if(time() <= ($filemtime + ( $this->timeout))){					
				return true;
			}
		}
		return false;
	}

	public function minutosUltimaAtualizacao($chave){
		$arquivo = $this->caminhoArquivo($chave);
		$filemtime = filemtime($arquivo);

		$inicio = new \DateTime(date('Y-m-d H:i:s', $filemtime));
		$atual = $inicio->diff(new \DateTime(date('Y-m-d H:i:s')));		

		$minutos = $atual->days * 24 * 60;
		$minutos += $atual->h * 60;
		$minutos += $atual->i;

		if(!empty($this->criado)) return 0;
		return $minutos;
	}

	public function dataUltimaAtualizacao($chave){
		$filemtime = filemtime($arquivo);
		if(!empty($this->criado)) return date('d/m/Y H:i:s');
		return date('d/m/Y H:i:s', $filemtime);	
	}

	public function horaUltimaAtualizacao($chave){
		$filemtime = filemtime($arquivo);
		if(!empty($this->criado)) return date('d/m/Y H:i:s');
		return date('d/m/Y H:i:s', $filemtime);	
	}

	public function criar($chave, $valor){
		$pasta = $this->folder;


		if (!is_dir( $pasta)) 
		{
		  mkdir($pasta, 0777, true);
		}

	$arquivo = $this->caminhoArquivo($chave);
		file_put_contents($arquivo, $valor);
		$this->criado = 1;
	}

	public function ler($chave){
		$arquivo = $this->caminhoArquivo($chave);
		if(file_exists($arquivo)){
			$result = file_get_contents($arquivo);
			return $result;
		}	
	}
}
?>
