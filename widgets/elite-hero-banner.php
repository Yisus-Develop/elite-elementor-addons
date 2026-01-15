<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * EWEB Elite Hero Banner Widget
 * 
 * A premium hero section with tag, styled title, subtitle and CTA button.
 * Designed for landing pages and home page headers.
 */
class EWEB_Elite_Hero_Banner extends \Elementor\Widget_Base {

	public function get_name() {
		return 'eweb_elite_hero_banner';
	}

	public function get_title() {
		return esc_html__( 'EWEB - Elite Hero Banner', 'eweb-elite-addons' );
	}

	public function get_icon() {
		return 'eicon-single-page';
	}

	public function get_categories() {
		return [ 'eweb-elite-addons' ];
	}

	protected function _register_controls() {

		// Content Section
		$this->start_controls_section(
			'section_content',
			[
				'label' => esc_html__( 'Content', 'eweb-elite-addons' ),
			]
		);

		$this->add_control(
			'tag_text',
			[
				'label' => esc_html__( 'Tag Text', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'INDUSTRIAL ENGINEERING', 'eweb-elite-addons' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'title_line1',
			[
				'label' => esc_html__( 'Title Line 1', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Building the', 'eweb-elite-addons' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'title_highlight',
			[
				'label' => esc_html__( 'Title Highlight (Italic)', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'Future', 'eweb-elite-addons' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'title_line2',
			[
				'label' => esc_html__( 'Title Line 2', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'of Industry', 'eweb-elite-addons' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label' => esc_html__( 'Subtitle', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => esc_html__( 'Industrial maintenance, design, automation and specialized consulting since 2022.', 'eweb-elite-addons' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'button_text',
			[
				'label' => esc_html__( 'Button Text', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => esc_html__( 'CONTACT US', 'eweb-elite-addons' ),
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'button_link',
			[
				'label' => esc_html__( 'Button Link', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => 'https://example.com/contact',
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->add_control(
			'background_image',
			[
				'label' => esc_html__( 'Background Image', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
				'dynamic' => [ 'active' => true ],
			]
		);

		$this->end_controls_section();

		// Style Section
		$this->start_controls_section(
			'section_style',
			[
				'label' => esc_html__( 'Style', 'eweb-elite-addons' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'accent_color',
			[
				'label' => esc_html__( 'Accent Color', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'default' => '#FACC15',
			]
		);

		$this->add_control(
			'min_height',
			[
				'label' => esc_html__( 'Minimum Height', 'eweb-elite-addons' ),
				'type' => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', 'vh' ],
				'range' => [
					'px' => [ 'min' => 300, 'max' => 1000 ],
					'vh' => [ 'min' => 50, 'max' => 100 ],
				],
				'default' => [
					'unit' => 'vh',
					'size' => 90,
				],
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();
		$bg_url = $settings['background_image']['url'];
		$accent = $settings['accent_color'];
		$min_height = $settings['min_height']['size'] . $settings['min_height']['unit'];
		?>
		<div class="elite-hero-banner" style="background-image: url('<?php echo esc_url( $bg_url ); ?>'); min-height: <?php echo esc_attr( $min_height ); ?>;">
			<div class="elite-hero-overlay"></div>
			<div class="elite-hero-content">
				<?php if ( ! empty( $settings['tag_text'] ) ) : ?>
					<span class="elite-hero-tag" style="background-color: <?php echo esc_attr( $accent ); ?>;">
						<?php echo esc_html( $settings['tag_text'] ); ?>
					</span>
				<?php endif; ?>

				<h1 class="elite-hero-title">
					<?php echo esc_html( $settings['title_line1'] ); ?>
					<em style="color: <?php echo esc_attr( $accent ); ?>;"><?php echo esc_html( $settings['title_highlight'] ); ?></em>
					<?php echo esc_html( $settings['title_line2'] ); ?>
				</h1>

				<?php if ( ! empty( $settings['subtitle'] ) ) : ?>
					<p class="elite-hero-subtitle"><?php echo esc_html( $settings['subtitle'] ); ?></p>
				<?php endif; ?>

				<?php if ( ! empty( $settings['button_text'] ) ) : 
					$link = $settings['button_link'];
					$target = $link['is_external'] ? ' target="_blank"' : '';
					$nofollow = $link['nofollow'] ? ' rel="nofollow"' : '';
				?>
					<a href="<?php echo esc_url( $link['url'] ); ?>" class="elite-hero-button" style="background-color: <?php echo esc_attr( $accent ); ?>;"<?php echo $target . $nofollow; ?>>
						<?php echo esc_html( $settings['button_text'] ); ?>
					</a>
				<?php endif; ?>
			</div>
		</div>
		<?php
	}

	protected function _content_template() {
		?>
		<#
		var bgUrl = settings.background_image.url;
		var accent = settings.accent_color || '#FACC15';
		var minHeight = settings.min_height.size + settings.min_height.unit;
		#>
		<div class="elite-hero-banner" style="background-image: url('{{{ bgUrl }}}'); min-height: {{{ minHeight }}};">
			<div class="elite-hero-overlay"></div>
			<div class="elite-hero-content">
				<# if ( settings.tag_text ) { #>
					<span class="elite-hero-tag" style="background-color: {{{ accent }}};">{{{ settings.tag_text }}}</span>
				<# } #>

				<h1 class="elite-hero-title">
					{{{ settings.title_line1 }}}
					<em style="color: {{{ accent }}};">{{{ settings.title_highlight }}}</em>
					{{{ settings.title_line2 }}}
				</h1>

				<# if ( settings.subtitle ) { #>
					<p class="elite-hero-subtitle">{{{ settings.subtitle }}}</p>
				<# } #>

				<# if ( settings.button_text ) { #>
					<a href="{{{ settings.button_link.url }}}" class="elite-hero-button" style="background-color: {{{ accent }}};">
						{{{ settings.button_text }}}
					</a>
				<# } #>
			</div>
		</div>
		<?php
	}
}
