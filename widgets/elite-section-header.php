<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * EWEB Elite Section Header Widget
 * 
 * A premium section header with label, title and watermark background.
 */
class EWEB_Elite_Section_Header extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eweb_elite_section_header';
	}

	public function get_title() {
		return esc_html__( 'EWEB - Elite Section Header', 'eweb-elite-addons' );
	}

	public function get_icon() {
		return 'eicon-heading';
	}

	public function get_categories() {
		return [ 'eweb-elite-addons' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'eweb-elite-addons' ),
			]
		);

		$this->add_control(
			'label',
			[
				'label' => esc_html__( 'Label (Gold Text)', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'OUR SERVICES', 'eweb-elite-addons' ),
				'placeholder' => esc_html__( 'Enter your label', 'eweb-elite-addons' ),
                'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'title',
			[
				'label' => esc_html__( 'Title', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Engineering Excellence', 'eweb-elite-addons' ),
				'placeholder' => esc_html__( 'Enter your title', 'eweb-elite-addons' ),
                'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'watermark',
			[
				'label' => esc_html__( 'Watermark Text (Background)', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'ELITE', 'eweb-elite-addons' ),
				'placeholder' => esc_html__( 'Enter background text', 'eweb-elite-addons' ),
                'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'align',
			[
				'label' => esc_html__( 'Alignment', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'eweb-elite-addons' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'eweb-elite-addons' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'eweb-elite-addons' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} .elite-header-container' => 'text-align: {{VALUE}};',
				],
			]
		);

		$this->end_controls_section();

		// =====================
		// STYLE TAB
		// =====================

		// Label Style
		$this->start_controls_section(
			'section_style_label',
			[
				'label' => esc_html__( 'Label', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'label_color',
			[
				'label' => esc_html__( 'Color', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FACC15',
				'selectors' => [
					'{{WRAPPER}} .elite-header-label' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'label_typography',
				'selector' => '{{WRAPPER}} .elite-header-label',
			]
		);

		$this->add_responsive_control(
			'label_spacing',
			[
				'label' => esc_html__( 'Bottom Spacing', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'em' ],
				'range' => [
					'px' => [ 'min' => 0, 'max' => 50 ],
				],
				'default' => [ 'size' => 10, 'unit' => 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elite-header-label' => 'margin-bottom: {{SIZE}}{{UNIT}};',
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
					'{{WRAPPER}} .elite-header-title' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'selector' => '{{WRAPPER}} .elite-header-title',
			]
		);

		$this->end_controls_section();

		// Watermark Style
		$this->start_controls_section(
			'section_style_watermark',
			[
				'label' => esc_html__( 'Watermark', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'watermark_color',
			[
				'label' => esc_html__( 'Color', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => 'rgba(255,255,255,0.03)',
				'selectors' => [
					'{{WRAPPER}} .elite-header-watermark' => 'color: {{VALUE}};',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'watermark_typography',
				'selector' => '{{WRAPPER}} .elite-header-watermark',
			]
		);

		$this->add_responsive_control(
			'watermark_size',
			[
				'label' => esc_html__( 'Font Size', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vw' ],
				'range' => [
					'px' => [ 'min' => 50, 'max' => 400 ],
					'vw' => [ 'min' => 5, 'max' => 30 ],
				],
				'default' => [ 'size' => 180, 'unit' => 'px' ],
				'selectors' => [
					'{{WRAPPER}} .elite-header-watermark' => 'font-size: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

		// Container Style
		$this->start_controls_section(
			'section_style_container',
			[
				'label' => esc_html__( 'Container', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_responsive_control(
			'container_padding',
			[
				'label' => esc_html__( 'Padding', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', 'em', '%' ],
				'selectors' => [
					'{{WRAPPER}} .elite-header-container' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		?>
		<div class="elite-header-container">
            <?php if ( ! empty( $settings['watermark'] ) ) : ?>
			    <div class="elite-header-watermark"><?php echo esc_html( $settings['watermark'] ); ?></div>
            <?php endif; ?>
            
            <div class="elite-header-content">
                <?php if ( ! empty( $settings['label'] ) ) : ?>
				    <div class="elite-header-label"><?php echo esc_html( $settings['label'] ); ?></div>
                <?php endif; ?>

                <?php if ( ! empty( $settings['title'] ) ) : ?>
				    <h2 class="elite-header-title"><?php echo wp_kses_post( $settings['title'] ); ?></h2>
                <?php endif; ?>
            </div>
		</div>
		<?php
	}

	protected function _content_template() {
		?>
		<#
		var title = settings.title;
        var label = settings.label;
        var watermark = settings.watermark;
		#>
		<div class="elite-header-container">
            <# if ( watermark ) { #>
			    <div class="elite-header-watermark">{{{ watermark }}}</div>
            <# } #>

            <div class="elite-header-content">
                <# if ( label ) { #>
				    <div class="elite-header-label">{{{ label }}}</div>
                <# } #>

                <# if ( title ) { #>
				    <h2 class="elite-header-title">{{{ title }}}</h2>
                <# } #>
            </div>
		</div>
		<?php
	}
}
