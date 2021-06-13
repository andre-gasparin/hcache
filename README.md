# Criando Cache em arquivos
> Uma forma simples, fácil e eficiente. Quando você possui algum bloco na dashboard, ou alguma informação que consuma muito recurso na requisição e varios usuários tem acesso a mesma informação, você cria um arquivo de cache para evitar a requisição por alguns minutos.
> Ideal para utilizar em micro-frameworks e também no adianti.
<p align="center">
<img src="https://img.shields.io/badge/VERSÃO-1.0.1-green">
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
//Instanciamos a classe com a quantidade de segundos que a informação ficara no cache. (no caso 20)
$cache  = new HCache(20);

//Criamos um cache qualquer 
//Verifica se o cache existe e o prazo para utiliza-lo, caso não exista criamos
if(!$cache->existe('NomedoCache')){  
    //Criamos o conteúdo do cache
    $conteudo = 'Data e Hora atual: '.date('H:i:s');
    //Criamos o cache
    $cache->criar('NomedoCache', $conteudo);
}
else
{
    //caso ele exista e esteja dentro da validade nós trazemos o conteúdo
    $conteudo = $cache->ler('NomedoCache');
}
//Exibir conteúdo do cache
echo '<br> Conteúdo:<br>';
echo $conteudo;

//Algumas funções para verificar a data de criação/atualização daquele cache, caso queira exibir a data da informação para o usuário

echo 'Atualizado à '.$cache->minutosUltimaAtualizacao('NomedoCache').' Minutos <br>';
echo 'Atualizado na data '.$cache->dataUltimaAtualizacao('NomedoCache').' <br>';
echo 'Atualizado às '.$cache->horaUltimaAtualizacao('NomedoCache').' horas <br>';


?>
```

## Configuração para Desenvolvimento

Caso queira implementar algo no sistema, ficaremos felizes com sua participação!

## Precisa de melhoria ou ajuda com algum BUG?

<a href="https://github.com/andre-gasparin/hcache/issues">Issues</a>


## Histórico (ChangeLog)

* 1.0.0
    * Projeto criado
* 1.0.1 
    * Correções na classe 	

## Meta

André Gasparin – [@andre-gasparin] – andre@gasparimsat.com.br / andre.gasparin@hotmail.com

Distribuído sob a Licença Pública Geral GNU (GPLv3) 


## Contributing

1. Faça o _fork_ do projeto (<https://https://github.com/andre-gasparin/hcache/fork>)
2. Crie uma _branch_ para sua modificação (`git checkout -b feature/fooBar`)
3. Faça o _commit_ (`git commit -am 'Add some fooBar'`)
4. _Push_ (`git push origin feature/fooBar`)
5. Crie um novo _Pull Request_
