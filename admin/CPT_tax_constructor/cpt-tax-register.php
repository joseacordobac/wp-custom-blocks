<?php

require_once 'CustomPostTypeConstructor.php';
require_once 'TaxonomiesConstructor.php';

/** Create CPT **/
// new CustomPostType(name, single name, related taxonomies, dash icon, type, register name, 'show in menu', has archive, 'rute name, position )
//new CustomPostTypeConstructor('Portafolio', 'portafolio', ['usos, marcas'], 'book-alt', ['post'], 'portafolio', false, true, 'portafolio', 10);

/** Taxonomies **/
// new CustomTaxonomy(name, true, rewrite, register name, array(tipo de publicación));
//new TaxonomiesConstructor('Tipo de producto', true, 'tipo-producto', 'tipo-producto', ['portafolio']);
//new TaxonomiesConstructor('Marcas', true, 'marcas', 'marcas', ['portafolio']);