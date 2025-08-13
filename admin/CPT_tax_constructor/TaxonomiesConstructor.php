<?php

class TaxonomiesConstructor
{
    private string $name;
    private bool $hierarchical;
    private string $rewrite_text;
    private string $taxonomy_name;
    private array $associated_cpts;

    /**
     * TaxonomiesConstructor constructor.
     *
     * @param string $name
     * @param bool $hierarchical
     * @param string $rewrite_text
     * @param string $taxonomy_name
     * @param array $associated_cpts
     */
    public function __construct(
        string $name,
        bool $hierarchical,
        string $rewrite_text,
        string $taxonomy_name,
        array $associated_cpts
    ) {
        $this->name = $name;
        $this->hierarchical = $hierarchical;
        $this->rewrite_text = $rewrite_text;
        $this->taxonomy_name = $taxonomy_name;
        $this->associated_cpts = $associated_cpts;

        add_action('init', [$this, 'register_taxonomy']);
    }

    /**
     * Registers the taxonomy with WordPress.
     */
    public function register_taxonomy(): void
    {
        $labels = [
            'name'              => _x($this->name, 'taxonomy general name'),
            'singular_name'     => _x($this->name, 'taxonomy singular name'),
            'search_items'      => __('Buscar ' . $this->name),
            'all_items'         => __('Todas las ' . $this->name),
            'edit_item'         => __('Editar ' . $this->name),
            'update_item'       => __('Actualizar ' . $this->name),
            'add_new_item'      => __('Agregar ' . $this->name),
            'new_item_name'     => __('Nueva ' . $this->name),
            'menu_name'         => __($this->name),
        ];

        $args = [
            'hierarchical'      => $this->hierarchical,
            'labels'            => $labels,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => $this->rewrite_text],
            'show_in_rest'      => true,
        ];

        register_taxonomy($this->taxonomy_name, $this->associated_cpts, $args);
    }
}