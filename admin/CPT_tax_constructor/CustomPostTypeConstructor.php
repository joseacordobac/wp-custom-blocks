<?php 

/**
 * Class CustomPostTypeConstructor
 * Handles the registration and capability assignment for custom post types.
 */
class CustomPostTypeConstructor
{
    private string $name;
    private string $singular_name;
    private array $taxonomies;
    private string $menu_icon;
    private array $capabilities;
    private string $register_post_type_name;
    private bool $show_in_menu;
    private bool $has_archive;
    private string $rewrite;
    private int $menu_position;
    private bool $editor;

    /**
     * CustomPostTypeConstructor constructor.
     *
     * @param string $name
     * @param string $singular_name
     * @param array $taxonomies
     * @param string $menu_icon
     * @param array $capabilities
     * @param string $register_post_type_name
     * @param bool $has_archive
     * @param bool $show_in_menu
     * @param string $rewrite
     */
    
    public function __construct(
        string $name,
        string $singular_name,
        array $taxonomies,
        string $menu_icon,
        array $capabilities,
        string $register_post_type_name,
        bool $has_archive = true,
        bool $show_in_menu = true,
        string $rewrite = '',
        int $menu_position = 30,
        bool $editor = true
    ) {
        $this->name = $name;
        $this->singular_name = $singular_name;
        $this->taxonomies = $taxonomies;
        $this->menu_icon = $menu_icon;
        $this->capabilities = $capabilities;
        $this->register_post_type_name = $register_post_type_name;
        $this->show_in_menu = $show_in_menu;
        $this->has_archive = $has_archive;
        $this->rewrite = $rewrite;
        $this->menu_position = $menu_position;
        $this->editor = $editor;
        add_action('init', [$this, 'register_and_add_caps']);
    }

    /**
     * Registers the custom post type and adds custom capabilities.
     */
    public function register_and_add_caps(): void
    {
        $this->register_custom_post_type();
        $this->add_custom_caps();
    }

    /**
     * Registers the custom post type with WordPress.
     */
    public function register_custom_post_type(): void
    {
        $labels = [
            'name'          => $this->name,
            'singular_name' => $this->singular_name,
            'capabilities'  => $this->capabilities,
        ];

        $supports = [
            'title',
            'excerpt',
            'author',
            'thumbnail',
            'comments',
            'trackbacks',
            'revisions',
            'custom-fields',
            'page-attributes',
        ];

        if($this->editor) {
            $supports[] = 'editor';
        }

        $args = [
            'labels'             => $labels,
            'description'        => $this->singular_name,
            'supports'           => $supports,
            'taxonomies'         => $this->taxonomies,
            'hierarchical'       => true,
            'public'             => true,
            'show_ui'            => true,
            'show_in_menu'       => $this->show_in_menu,
            'show_in_nav_menus'  => true,
            'show_in_admin_bar'  => true,
            'menu_position'      => $this->menu_position,
            'can_export'         => true,
            'has_archive'        => $this->has_archive,
            'menu_icon'          => 'dashicons-' . $this->menu_icon,
            'exclude_from_search'=> false,
            'publicly_queryable' => true,
            'capability_type'    => [$this->register_post_type_name, $this->register_post_type_name . 's'],
            'show_in_rest'       => true,
            'rewrite'            => [
                'slug' => $this->rewrite !== '' ? $this->rewrite : $this->register_post_type_name,
            ],
        ];

        register_post_type($this->register_post_type_name, $args);
    }

    /**
     * Adds custom capabilities for the custom post type to the administrator role.
     */
    public function add_custom_caps(): void
    {
        $admin_role = get_role('administrator');
        $cpt = $this->register_post_type_name;
        $cpt_plural = $cpt . 's';

        if ($admin_role) {
            $caps = [
                "edit_{$cpt}",
                "edit_{$cpt_plural}",
                "edit_others_{$cpt}",
                "edit_others_{$cpt_plural}",
                "publish_{$cpt_plural}",
                "read_{$cpt}",
                "delete_{$cpt}",
                "delete_{$cpt_plural}",
                "delete_others_{$cpt}",
                "delete_others_{$cpt_plural}",
                "read_private_{$cpt_plural}",
            ];

            foreach ($caps as $cap) {
                $admin_role->add_cap($cap);
            }
        }
    }
}