<?php

namespace Drupal\tzfield\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'timezone_default' widget.
 *
 * @FieldWidget(
 *   id = "tzfield_default",
 *   label = @Translation("Time zone"),
 *   field_types = {
 *     "tzfield"
 *   }
 * )
 */
class TimezoneDefaultWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $element['value'] = [
              '#type' => 'select',
              '#options' => array_combine(\DateTimeZone::listIdentifiers(), \DateTimeZone::listIdentifiers()),
              '#default_value' => isset($items[$delta]->value) ? $items[$delta]->value : drupal_get_user_timezone(),
           ];
    return $element;
  }

}
