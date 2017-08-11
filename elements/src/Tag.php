<?php
namespace Drupal\xml_form_elements;

/**
 * Static functions that allow for theming and processing tabpanels.
 */
class Tag {

  /**
   * Constants
   */
  const REMOVE_BUTTON = 'remove-tag';
  const EDIT_BUTTON = 'edit-tag';

  // @deprecated Constants
  // @codingStandardsIgnoreStart
  const RemoveButton = self::REMOVE_BUTTON;
  const EditButton = self::EDIT_BUTTON;
  // @codingStandardsIgnoreEnd

  /**
   * TabPanel's theme hook.
   *
   * @param array $element
   *   The theme element.
   *
   * @return string
   *   A div string to pass back to the theme.
   */
  public static function Theme($element) {
    $children = isset($element['#children']) ? $element['#children'] : '';
    $description = isset($element['#description']) ? "<div class='description'>{$element['#description']}</div>" : '';
    return "<div id='{$element['#hash']}'>{$description}{$children}</div>";
  }

  /**
   * The default #process function for tags.
   *
   * Adds elements that allow for adding/remove form elements.
   *
   * @param array $element
   *   The element to process.
   * @param array $form_state
   *   The Drupal form state.
   * @param array $complete_form
   *   The completed form.
   *
   * @return array
   *   The processed element.
   */
  public static function Process(array $element, array &$form_state, array $complete_form = NULL) {
    $tags = &get_form_element_parent($element, $complete_form);
    $element['#id'] = $element['#hash'];
    $element['#title'] = isset($tags['#title']) ? $tags['#title'] : FALSE;
    $element['#value'] = isset($element['#value']) ? $element['#value'] : FALSE;
    return $element;
  }
}