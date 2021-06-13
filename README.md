# Criando Cache em arquivos
> Uma forma simples, fácil e eficiente. Quando você possui algum bloco na dashboard, ou alguma informação que consuma muito recurso na requisição e varios usuários tem acesso a mesma informação, você cria um arquivo de cache para evitar a requisição por alguns minutos.
<p align="center">
<img src="https://img.shields.io/badge/VERSÃO-1.0-green">
<img src="https://img.shields.io/badge/Licença-GNU 3.0-success">
<img src="https://img.shields.io/badge/PHP->7.2-blueviolet">
</p>



## Instalação

É necessário que você tenha o composer instalado.

Abra seu cmd (prompt), com o comando "cd c:/pasta/do/projeto" navegue até a raiz do seu projeto em adianti.

Execute os seguintes comandos (podem variar no caso de usar linux ou mac, ex utilizar sudo no início):

```html
composer require andregasparin/hcache
```

Para instalar no Adianti Builder, vá na aba de "composer packages" e adicione:

```html
composer require andregasparin/hcache
```

## Utilização

Adicione a linha no início de onde você irá utilizar:
use  AndreGasparin\Plugins\HCache\HCache;

Depois utilize a classe, exemplo:


```html
<?php 
$cache  = new HCache(20);

if(!$cache->existe('eadParametros')){  
    //Consultar no banco e colocar o conteúdo
    $conteudo = 'Hora2 '.date('H:i:s');
	
    //
    $cache->criar('eadParametros', $conteudo);
}
else
{
    $conteudo = $cache->ler('eadParametros');
}

echo 'Atualizado à '.$cache->minutosUltimaAtualizacao('eadParametros').' Minutos';

echo $conteudo;
?>
```


## Configuração para Desenvolvimento

Caso queira implementar algo no sistema, ficaremos felizes com sua participação!

## Precisa de melhoria ou ajuda com algum BUG?

<a href="https://github.com/andre-gasparin/hcache/issues">Issues</a>


## Histórico (ChangeLog)

* 1.0.0
    * Projeto criado


## Meta

André Gasparin – [@andre-gasparin] – andre@gasparimsat.com.br / andre.gasparin@hotmail.com

Distribuído sob a Licença Pública Geral GNU (GPLv3) 


## Contributing

1. Faça o _fork_ do projeto (<https://https://github.com/andre-gasparin/hcache/fork>)
2. Crie uma _branch_ para sua modificação (`git checkout -b feature/fooBar`)
3. Faça o _commit_ (`git commit -am 'Add some fooBar'`)
4. _Push_ (`git push origin feature/fooBar`)
5. Crie um novo _Pull Request_
