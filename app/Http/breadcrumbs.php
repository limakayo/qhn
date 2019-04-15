<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Página Inicial', route('index'));
});

// Home > Nobreaks
Breadcrumbs::register('nobreaks', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Nobreaks', route('nobreaks.index'));
});

// Home > Estabilizadores
Breadcrumbs::register('estabilizadores', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Estabilizadores', route('estabilizadores.index'));
});

// Home > Marca
Breadcrumbs::register('marca', function($breadcrumbs, $marca)
{
    $breadcrumbs->parent('home');
    $nome = explode(' ', $marca->nome);
    $nome = $nome[0];
    $nome = strtolower($nome);
    $breadcrumbs->push($marca->nome, route('marca', $nome));
});

// Home > Segmento
Breadcrumbs::register('segmento', function($breadcrumbs, $segmento)
{
    $breadcrumbs->parent('home');
    $nome = explode(' ', $segmento->segmento);
    $nome = $nome[0];
    $nome = strtolower($nome);
    $breadcrumbs->push($segmento->segmento, route('segmento', $nome));
});

// Home > Nobreaks > Marca > Nobreak
Breadcrumbs::register('nobreak', function($breadcrumbs, $nobreak)
{
    if (strpos(URL::previous(), 'nobreaks-'))
        $breadcrumbs->parent('marca', $nobreak->marca);
    else
        $breadcrumbs->parent('nobreaks');
    
    $breadcrumbs->push($nobreak->nome, route('nobreaks.show', $nobreak->id));
});

// Home > Nobreaks > Marca > Estabilizador
Breadcrumbs::register('estabilizador', function($breadcrumbs, $estabilizador)
{
    if (strpos(URL::previous(), 'nobreaks-'))
        $breadcrumbs->parent('marca', $estabilizador->marca);
    else
        $breadcrumbs->parent('estabilizadores');

    $breadcrumbs->push($estabilizador->nome, route('estabilizadores.show', $estabilizador->id));
});

// Home > Servicos
Breadcrumbs::register('servicos', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Serviços', route('servicos'));
});

// Home > Contato
Breadcrumbs::register('contato', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contato', route('contato'));
});
