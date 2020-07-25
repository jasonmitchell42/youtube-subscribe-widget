<?php

/**
 * Adds YouTube_Subs widget.
 */
class YouTube_Subs extends WP_Widget
{
    /**
     * Register widget with WordPress.
     */
    function __construct()
    {
        parent::__construct(
            'youtubesubs_widget', // Base ID
            esc_html__('YouTube Subscribe', 'yts_domain'), // Name
            array('description' => esc_html__('Widget to display youtube subs', 'yts_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from database.
     * @see WP_Widget::widget()
     *
     */
    public function widget($args, $instance)
    {
        echo $args['before_widget']; // whatever you want to display before widget (<div>, etc)
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }

        // widgets content output
        printf("<div class='g-ytsubscribe' data-channelid='%s' data-layout='%s' data-count='%s'></div>",
            $instance['channel'],
            $instance['layout'],
            $instance['count']
        );

        echo $args['after_widget']; // whatever you want to display after the widget (</div>, etc)
    }

    /**
     * Back-end widget form.
     *
     * @param array $instance Previously saved values from database.
     * @see WP_Widget::form()
     *
     */
    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('Subscribe to Youtube', 'yts_domain');
        $channel = !empty($instance['channel']) ? $instance['channel'] : esc_html__('UCAT_KaDLugomiw9D524113Q', 'yts_domain');
        $layout = !empty($instance['layout']) ? $instance['layout'] : esc_html__('default', 'yts_domain');
        $count = !empty($instance['count']) ? $instance['count'] : esc_html__('default', 'yts_domain');
        ?>

        <?php // title
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_attr_e('Title:', 'yts_domain'); ?></label>
            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                    type="text"
                    value="<?php echo esc_attr($title); ?>"
            >
        </p>
        <?php // channel
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('channel')); ?>"><?php esc_attr_e('Channel:', 'yts_domain'); ?></label>
            <input
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('channel')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('channel')); ?>"
                    type="text"
                    value="<?php echo esc_attr($channel); ?>"
            >
        </p>
        <?php // layout
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('layout')); ?>"><?php esc_attr_e('Layout:', 'yts_domain'); ?></label>
            <select
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('layout')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('layout')); ?>">
                <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>Default</option>
                <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>Full</option>
            </select>
        </p>
        <?php // count
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('count')); ?>"><?php esc_attr_e('Show Count:', 'yts_domain'); ?></label>
            <select
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('count')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('count')); ?>">
                <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>Default (shown)</option>
                <option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>Hidden</option>
            </select>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     * @see WP_Widget::update()
     *
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['channel'] = (!empty($new_instance['channel'])) ? sanitize_text_field($new_instance['channel']) : '';
        $instance['layout'] = (!empty($new_instance['layout'])) ? sanitize_text_field($new_instance['layout']) : '';
        $instance['count'] = (!empty($new_instance['count'])) ? sanitize_text_field($new_instance['count']) : '';
        return $instance;
    }

} // class Foo_Widget