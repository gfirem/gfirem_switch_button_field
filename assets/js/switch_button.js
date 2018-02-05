/*
 * @package WordPress
 * @subpackage Formidable, gfirem
 * @author GFireM
 * @copyright 2017
 * @link http://www.gfirem.com
 * @license http://www.apache.org/licenses/
 *
 */
jQuery(document).ready(function ($) {
	/* <fs_premium_only> */
	$(".gfirem_switch_button").each(function (index, value) {
		var current = $(this),
			id = current.attr('id'),
			checked = false;
		if (current.val() && current.val() == gfirem_switch_button.config[id].on_label) {
			checked = true;
		}
		var switch_options = {
			checked: checked,
			width: gfirem_switch_button.config[id].width,
			height: gfirem_switch_button.config[id].height,
			button_width: gfirem_switch_button.config[id].button_width,
			show_labels: gfirem_switch_button.config[id].width,
			labels_placement: gfirem_switch_button.config[id].labels_placement,
			on_label: gfirem_switch_button.config[id].on_label,
			off_label: gfirem_switch_button.config[id].off_label,
		};

		current.switchButton(switch_options);
		var identifier = id.split('_')[1];
		if (checked) {
			jQuery("#switch_" + identifier + " .switch-button-background").css("background", gfirem_switch_button.config[id].oncolor);
		}
		else {
			jQuery("#switch_" + identifier + " .switch-button-background").css("background", gfirem_switch_button.config[id].offcolor);
		}
	});
	/* </fs_premium_only> */
});

