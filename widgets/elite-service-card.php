<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class EWEB_Elite_Service_Card extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eweb_elite_service_card';
	}

	public function get_title() {
		return esc_html__( 'EWEB - Elite Service Card', 'eweb-elite-addons' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'eweb-elite-addons' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        // Icon Control
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'elite-addons' ),
				'type' => \Elementor\Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-cogs',
					'library' => 'fa-solid',
				],
			]
		);

        // Title Control (Dynamic)
		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Service Title', 'elite-addons' ),
                'dynamic' => [
					'active' => true,
				],
                'label_block' => true,
			]
		);

        // Description Control (Dynamic)
        $this->add_control(
			'description',
			[
				'label' => esc_html__( 'Description', 'elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Service description goes here.', 'elite-addons' ),
                'dynamic' => [
					'active' => true,
				],
			]
		);

        // Link Control (Dynamic)
        $this->add_control(
			'link',
			[
				'label' => esc_html__( 'Link', 'elite-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => esc_html__( 'https://your-link.com', 'elite-addons' ),
				'dynamic' => [
					'active' => true,
				],
			]
		);

        // Background Image Control (Dynamic)
        $this->add_control(
			'bg_image',
			[
				'label' => esc_html__( 'Background Image', 'elite-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
                'dynamic' => [
					'active' => true,
				],
			]
		);

        // Animation Delay Control
        $this->add_control(
			'anim_delay',
			[
				'label' => esc_html__( 'Entrance Delay', 'elite-addons' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'rb-animate-1',
				'options' => [
					'rb-animate-1' => 'Delay 1 (0.1s)',
					'rb-animate-2' => 'Delay 2 (0.2s)',
					'rb-animate-3' => 'Delay 3 (0.3s)',
                    'rb-animate-4' => 'Delay 4 (0.5s)',
                    'rb-animate-5' => 'Delay 5 (0.6s)',
                    'rb-animate-6' => 'Delay 6 (0.7s)',
                    '' => 'None'
				],
			]
		);

		$this->end_controls_section();

		// =====================
		// STYLE TAB
		// =====================

		// Icon Style
		$this->start_controls_section(
			'section_style_icon',
			[
				'label' => esc_html__( 'Icon', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FACC15',
				'selectors' => [
					'{{WRAPPER}} .elite-service-icon i' => 'color: {{VALUE}};',
					'{{WRAPPER}} .elite-service-icon svg' => 'fill: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'icon_size',
			[
				'label' => esc_html__( 'Icon Size', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [ 'min' => 20, 'max' => 100 ],
					'em' => [ 'min' => 1, 'max' => 6 ],
				],
				'default' => [ 'size' => 48, 'unit' => 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elite-service-icon i' => 'font-size: {{SIZE}}{{UNIT}};',
					'{{WRAPPER}} .elite-service-icon svg' => 'width: {{SIZE}}{{UNIT}}; height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Title Style
		$this->start_controls_section(
			'section_style_title',
			[
				'label' => esc_html__( 'Title', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_color',
			[
				'label' => esc_html__( 'Color', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#ffffff',
				'selectors' => [
					'{{WRAPPER}} .elite-service-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elite-service-title',
			]
		);

		$this->end_controls_section();

		// Description Style
		$this->start_controls_section(
			'section_style_description',
			[
				'label' => esc_html__( 'Description', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_color',
			[
				'label' => esc_html__( 'Color', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.8)',
				'selectors' => [
					'{{WRAPPER}} .elite-service-desc' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'description_typography',
				'selector' => '{{WRAPPER}} .elite-service-desc',
			]
		);

		$this->end_controls_section();

		// Card Style
		$this->start_controls_section(
			'section_style_card',
			[
				'label' => esc_html__( 'Card', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label' => esc_html__( 'Overlay Color', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(0, 0, 0, 0.6)',
				'selectors' => [
					'{{WRAPPER}} .elite-service-card::before' => 'background: {{VALUE}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_padding',
			[
				'label' => esc_html__( 'Padding', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elite-service-inner' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_responsive_control(
			'card_min_height',
			[
				'label' => esc_html__( 'Minimum Height', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [ 'min' => 200, 'max' => 600 ],
					'vh' => [ 'min' => 20, 'max' => 80 ],
				],
				'default' => [ 'size' => 350, 'unit' => 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elite-service-card' => 'min-height: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'card_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elite-service-card' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
        
        // Prepare variables
        $title = $settings['title'];
        $desc = $settings['description'];
        $bg_url = $settings['bg_image']['url'];
        $anim_class = $settings['anim_delay'];

        // Render HTML structure matching our verified hybrid design
        ?>
        <div class="elite-service-card <?php echo esc_attr($anim_class); ?>" style="background-image: url('<?php echo esc_url($bg_url); ?>');">
            <div class="elite-service-inner">
                <div class="elite-service-icon">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <div class="elite-service-content">
                    <h3 class="elite-service-title"><?php echo esc_html($title); ?></h3>
                    <p class="elite-service-desc"><?php echo esc_html($desc); ?></p>
                </div>
            </div>
        </div>
        <?php
	}

    protected function content_template() {
        ?>
        <#
        var image_url = settings.bg_image.url;
        #>
        <div class="elite-service-card" style="background-image: url('{{ image_url }}');">
            <div class="elite-service-inner">
                <div class="elite-service-icon">
                    <# var iconHTML = elementor.helpers.renderIcon( view, settings.icon, { 'aria-hidden': true }, 'i' , 'object' ); #>
					{{{ iconHTML.value }}}
                </div>
                <div class="elite-service-content">
                    <h3 class="elite-service-title">{{{ settings.title }}}</h3>
                    <p class="elite-service-desc">{{{ settings.description }}}</p>
                </div>
            </div>
        </div>
        <?php
    }
}
