<?php

namespace Drupal\theme_color_palette\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures the site colors of the theme.
 */
class ThemeColorPaletteForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
    public function getFormId() {
        return 'theme_color_palette_settings';
    }

  /**
   * {@inheritdoc}
   */
    protected function getEditableConfigNames() {
        return [
            'theme_color_palette.theme_color_palette_settings',
        ];
    }

  /**
   * {@inheritdoc}
   */
    public function buildForm(array $form, FormStateInterface $form_state) {
        
        $config = $this->config('theme_color_palette.theme_color_palette_settings');
        
        $form['theme_color_palette_heading'] = [
            '#type' => 'item',
            '#markup' => t('<h2>Available <em>Theme Color Palette</em> Settings</h2>'),
        ];
        
        //** Header major region options
        $form['header_major_region'] = array(
            '#type' => 'fieldset',
            '#weight' => 0,
            '#title' => t('Header Major Region Colors'),
            '#attributes' => array(
                'class' => array(
                    'header_major_region',
                ),
            ),
        );
        
        $form['header_major_region']['header_major_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('Header Major Background Color<span style="background-color: ' . $config->get('header_major_background_color') . '; width: 40px; height: 40px; margin: 10px; display: inline-block; vertical-align: middle;"></span>'),
            '#required' => false,
            '#description' => t('Set your Header Major Background Color. Include the "#". '),
            '#default_value' => $config->get('header_major_background_color') ? : '#2148cf',
        );
        
        $form['header_major_region']['header_major_links_color'] = array(
            '#type' => 'textfield',
            '#title' => t('Header Major Links Color<span style="background-color: ' . $config->get('header_major_links_color') . '; width: 40px; height: 40px; margin: 10px; display: inline-block; vertical-align: middle;"></span>'),
            '#required' => false,
            '#description' => t('Set your Header Major Links Color. Include the "#". '),
            '#default_value' => $config->get('header_major_links_color') ? : '#555555',
        );
        
        //** Header minor region options
        $form['header_minor_region'] = array(
            '#type' => 'fieldset',
            '#weight' => 0,
            '#title' => t('Header Minor Region Colors'),
            '#attributes' => array(
                'class' => array(
                    'header_minor_region',
                ),
            ),
        );
        
        $form['header_minor_region']['header_minor_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('Header Minor Background Color<span style="background-color: ' . $config->get('header_minor_background_color') . '; width: 40px; height: 40px; margin: 10px; display: inline-block; vertical-align: middle;"></span>'),
            '#required' => false,
            '#description' => t('Set your Header Minor Background Color. Include the "#". '),
            '#default_value' => $config->get('header_minor_background_color') ? : '#f3f3f3',
        );
        
        $form['header_minor_region']['header_minor_links_color'] = array(
            '#type' => 'textfield',
            '#title' => t('Header Minor Links Color<span style="background-color: ' . $config->get('header_minor_links_color') . '; width: 40px; height: 40px; margin: 10px; display: inline-block; vertical-align: middle;"></span>'),
            '#required' => false,
            '#description' => t('Set your Header Minor Links Color. Include the "#". '),
            '#default_value' => $config->get('header_minor_links_color') ? : '#555555',
        );
        
        //** Sidebar region options
        $form['sidebar_region'] = array(
            '#type' => 'fieldset',
            '#weight' => 0,
            '#title' => t('Sidebar Region Colors'),
            '#attributes' => array(
                'class' => array(
                    'sidebar_region',
                ),
            ),
        );
        
        $form['sidebar_region']['sidebar_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('Sidebar Background Color<span style="background-color: ' . $config->get('sidebar_background_color') . '; width: 40px; height: 40px; margin: 10px; display: inline-block; vertical-align: middle;"></span>'),
            '#required' => false,
            '#description' => t('Set your Sidebar Background Color. Include the "#". '),
            '#default_value' => $config->get('sidebar_background_color') ? : '#f3f3f3',
        );
        
        //** Admin sidebar region options
        $form['admin_sidebar_region'] = array(
            '#type' => 'fieldset',
            '#weight' => 0,
            '#title' => t('Admin Sidebar Region Colors'),
            '#attributes' => array(
                'class' => array(
                    'admin_sidebar_region',
                ),
            ),
        );
        
        $form['admin_sidebar_region']['admin_sidebar_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('Admin Sidebar Background Color<span style="background-color: ' . $config->get('admin_sidebar_background_color') . '; width: 40px; height: 40px; margin: 10px; display: inline-block; vertical-align: middle;"></span>'),
            '#required' => false,
            '#description' => t('Set your Admin Sidebar Background Color. Include the "#". '),
            '#default_value' => $config->get('admin_sidebar_background_color') ? : '#f3f3f3',
        );
        
        return parent::buildForm($form, $form_state);
    }

  /**
   * {@inheritdoc}
   */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('header_major_background_color', $values['header_major_background_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('header_major_links_color', $values['header_major_links_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('header_minor_background_color', $values['header_minor_background_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('header_minor_links_color', $values['header_minor_links_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('sidebar_background_color', $values['sidebar_background_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('admin_sidebar_background_color', $values['admin_sidebar_background_color'])
            ->save();
        parent::submitForm($form, $form_state);
        
    }

}