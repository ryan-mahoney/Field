<?php
namespace Field;

class InputRadioList {
	public function render ($field) {
		$field['attributes']['type'] = 'checkbox';
		$field['attributes']['name'] = $field['marker'] . '[' . $field['name'] . ']';

		if (is_callable($field['options'])) {
			$function = $field['options'];
			$field['options'] = $function();
		}

		if (is_array($field['options'])) {
			foreach ($field['options'] as $optionKey => $option) {
				if (is_array($option)) {
					foreach ($option as $key => $value) {
						echo '
						<label class="radio">
							<input type="radio" value="', $key, '" name="', $field['attributes']['name'], '" />', $value,
						'</label>';
						break;
					}
				} else {
					echo
					'<label class="radio">
						<input type="radio" value="', $optionKey, '" name="', $field['attributes']['name'], '" />', $option,
					'</label>';
				}
			}
		}
	}
}