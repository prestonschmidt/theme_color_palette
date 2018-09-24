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
            '#weight' => -100,
            '#markup' => t('<h2>Available <em>Theme Color Palette</em> Settings</h2>'),
        ];
        
        $form['theme_color_palette_details'] = [
            '#type' => 'item',
            '#weight' => -90,
            '#markup' => t('<p>Style options are separated by site regions. View the Blocks page to understand your regions areas.</p>'),
        ];
        
        //
        //** Page options
        //
        $form['site_page'] = array(
            '#type' => 'details',
            '#weight' => -20,
            '#title' => t('Site Page:'),
            '#collapsible' => TRUE,
            '#collapsed' => FALSE,
            '#attributes' => array(
                'class' => array(
                    'site_page',
                ),
            ),
        );
        
        $form['site_page']['site_page_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('site_page_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get('site_page_background_color')),
            '#required' => false,
            '#description' => t('Set your Site Pages Background Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('site_page_background_color') ? : '#f3f3f3',
        );
        
        //
        //** Header major region options
        //
        $form['header_major_region'] = array(
            '#type' => 'details',
            '#weight' => 0,
            '#title' => t('Header Major:'),
            '#attributes' => array(
                'class' => array(
                    'header_major_region',
                ),
            ),
        );
        
        $form['header_major_region']['header_major_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('header_major_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get('header_major_background_color')),
            '#required' => false,
            '#description' => t('Set your Header Major Background Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('header_major_background_color') ? : '#2148cf',
        );
        
        $form['header_major_region']['header_major_links_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('header_major_links_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Links Color: ' . $config->get('header_major_links_color')),
            '#required' => false,
            '#description' => t('Set your Header Major Links Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('header_major_links_color') ? : '#555555',
        );
        
        //
        //** Header minor region options
        //
        $form['header_minor_region'] = array(
            '#type' => 'details',
            '#weight' => 20,
            '#title' => t('Header Minor:'),
            '#attributes' => array(
                'class' => array(
                    'header_minor_region',
                ),
            ),
        );
        
        $form['header_minor_region']['header_minor_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('header_minor_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get('header_minor_background_color')),
            '#required' => false,
            '#description' => t('Set your Header Minor Background Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('header_minor_background_color') ? : '#f3f3f3',
        );
        
        $form['header_minor_region']['header_minor_links_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('header_minor_links_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Links Color: ' . $config->get('header_minor_links_color')),
            '#required' => false,
            '#description' => t('Set your Header Minor Links Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('header_minor_links_color') ? : '#555555',
        );
        
        //
        //** Sidebar region options
        //
        $form['sidebar_region'] = array(
            '#type' => 'details',
            '#weight' => 70,
            '#title' => t('Sidebar:'),
            '#attributes' => array(
                'class' => array(
                    'sidebar_region',
                ),
            ),
        );
        
        $form['sidebar_region']['sidebar_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('sidebar_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get('sidebar_background_color')),
            '#required' => false,
            '#description' => t('Set your Sidebar Background Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('sidebar_background_color') ? : '#f3f3f3',
        );
        
        //
        //** Admin sidebar region options
        //
        $form['admin_sidebar_region'] = array(
            '#type' => 'details',
            '#weight' => 90,
            '#title' => t('Admin Sidebar:'),
            '#attributes' => array(
                'class' => array(
                    'admin_sidebar_region',
                ),
            ),
        );
        
        $form['admin_sidebar_region']['admin_sidebar_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('admin_sidebar_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get('admin_sidebar_background_color')),
            '#required' => false,
            '#description' => t('Set your Admin Sidebar Background Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('admin_sidebar_background_color') ? : '#f3f3f3',
        );
        
        //
        //** Bottom content region options
        //
        $form['bottom_content_region'] = array(
            '#type' => 'details',
            '#weight' => 100,
            '#title' => t('Bottom Content:'),
            '#attributes' => array(
                'class' => array(
                    'bottom_content_region',
                ),
            ),
        );
        
        $form['bottom_content_region']['bottom_content_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('bottom_content_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get('bottom_content_background_color')),
            '#required' => false,
            '#description' => t('Set your Header Minor Background Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('bottom_content_background_color') ? : '#f3f3f3',
        );
        
        //
        //** Footer region options
        //
        $form['footer_region'] = array(
            '#type' => 'details',
            '#weight' => 100,
            '#title' => t('Footer:'),
            '#attributes' => array(
                'class' => array(
                    'footer_region',
                ),
            ),
        );
        
        $form['footer_region']['footer_background_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('footer_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get('footer_background_color')),
            '#required' => false,
            '#description' => t('Set your Header Minor Background Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('footer_background_color') ? : '#f3f3f3',
        );
        
        $form['footer_region']['footer_links_color'] = array(
            '#type' => 'textfield',
            '#title' => t('<span style="background-color: ' . $config->get('footer_links_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Links Color: ' . $config->get('footer_links_color')),
            '#required' => false,
            '#description' => t('Set your Header Minor Links Color. #HEX, rbg(), rgba(). '),
            '#default_value' => $config->get('footer_links_color') ? : '#555555',
        );
                
        return parent::buildForm($form, $form_state);
    }

  /**
   * {@inheritdoc}
   */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $values = $form_state->getValues();
        
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('site_page_background_color', $values['site_page_background_color']);
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
            ->set('admin_sidebar_background_color', $values['admin_sidebar_background_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('footer_background_color', $values['footer_background_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('bottom_content_background_color', $values['bottom_content_background_color']);
        $this->config('theme_color_palette.theme_color_palette_settings')
            ->set('footer_links_color', $values['footer_links_color'])
            ->save();
        parent::submitForm($form, $form_state);
        
    }

}