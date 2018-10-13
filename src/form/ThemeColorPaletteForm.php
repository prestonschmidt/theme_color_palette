<?php

namespace Drupal\theme_color_palette\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

//function theme_color_palette_preprocess_page(&$variables) {
//    $region = $variables['elements']['#configuration']['region'];
//    drupal_set_message($region);
//}

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
        
        // Get the site region list
        $theme = \Drupal::config('system.theme')->get('default');
        $system_region = system_region_list($theme, REGIONS_ALL);
                
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

        foreach ($system_region as $region) {
            
            $regionClean = preg_replace('/\W+/','_',strtolower(strip_tags($region)));
            
            $form[$region . '_fieldset'] = array(
                '#type' => 'fieldset',
                '#weight' => -20,
                '#title' => t('@name colors:', array('@name' => $region)),
                '#attributes' => array(
                    'class' => array(
                        $regionClean,
                    ),
                ),
            );
            
            $form[$region . '_fieldset'][$regionClean . '_background_color'] = [
                '#type' => 'textfield',
                '#title' => t('
                    <span style="background-color: ' . $config->get($regionClean . '_background_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>Background Color: ' . $config->get($regionClean . '_background_color')),
                '#required' => false,
                '#description' => t('Set the ' . $region . ' Background Color. #HEX, rbg(), rgba(). '),
                '#default_value' => $config->get($regionClean . '_background_color') ? : '#f3f3f3',
            ];
            
            $form[$region . '_fieldset'][$regionClean . '_h2_color'] = [
                '#type' => 'textfield',
                '#title' => t('
                    <span style="background-color: ' . $config->get($regionClean . '_h2_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>h2 Color: ' . $config->get($regionClean . '_p_color')),
                '#required' => false,
                '#description' => t('Set the ' . $region . ' h2 Color. #HEX, rbg(), rgba(). '),
                '#default_value' => $config->get($regionClean . '_h2_color') ? : '#000000',
            ];
            
            $form[$region . '_fieldset'][$regionClean . '_h3_color'] = [
                '#type' => 'textfield',
                '#title' => t('
                    <span style="background-color: ' . $config->get($regionClean . '_h3_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>h3 Color: ' . $config->get($regionClean . '_p_color')),
                '#required' => false,
                '#description' => t('Set the ' . $region . ' h3 Color. #HEX, rbg(), rgba(). '),
                '#default_value' => $config->get($regionClean . '_h3_color') ? : '#000000',
            ];
            
            $form[$region . '_fieldset'][$regionClean . '_h4_color'] = [
                '#type' => 'textfield',
                '#title' => t('
                    <span style="background-color: ' . $config->get($regionClean . '_h4_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>h4 Color: ' . $config->get($regionClean . '_p_color')),
                '#required' => false,
                '#description' => t('Set the ' . $region . ' h4 Color. #HEX, rbg(), rgba(). '),
                '#default_value' => $config->get($regionClean . '_h4_color') ? : '#000000',
            ];
            
            $form[$region . '_fieldset'][$regionClean . '_p_color'] = [
                '#type' => 'textfield',
                '#title' => t('
                    <span style="background-color: ' . $config->get($regionClean . '_p_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>p Color: ' . $config->get($regionClean . '_p_color')),
                '#required' => false,
                '#description' => t('Set the ' . $region . ' p Color. #HEX, rbg(), rgba(). '),
                '#default_value' => $config->get($regionClean . '_p_color') ? : '#000000',
            ];
            
            $form[$region . '_fieldset'][$regionClean . '_a_color'] = [
                '#type' => 'textfield',
                '#title' => t('
                    <span style="background-color: ' . $config->get($regionClean . '_a_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>a Color: ' . $config->get($regionClean . '_a_color')),
                '#required' => false,
                '#description' => t('Set the ' . $region . ' a Color. #HEX, rbg(), rgba(). '),
                '#default_value' => $config->get($regionClean . '_a_color') ? : '#ca1404',
            ];
            
            $form[$region . '_fieldset'][$regionClean . '_a_hover_color'] = [
                '#type' => 'textfield',
                '#title' => t('
                    <span style="background-color: ' . $config->get($regionClean . '_a_hover_color') . '; width: 40px; height: 30px; margin: 0 10px 10px 0; display: inline-block; vertical-align: middle; box-shadow: 0 0 8px rgba(0, 0, 0, 0.3); border: 3px solid #fff;"></span>a Hover Color: ' . $config->get($regionClean . '_a_hover_color')),
                '#required' => false,
                '#description' => t('Set the ' . $region . ' a Hover Color. #HEX, rbg(), rgba(). '),
                '#default_value' => $config->get($regionClean . '_a_hover_color') ? : '#ca1404',
            ];
                        
        }
                
        return parent::buildForm($form, $form_state);
    }

  /**
   * {@inheritdoc}
   */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        
        $values = $form_state->getValues();
        
        // Get the site region list
        $theme = \Drupal::config('system.theme')->get('default');
        $system_region = system_region_list($theme, REGIONS_ALL);
        
        
        //Get path to module
        $module_handler = \Drupal::service('module_handler');
        $moduel_path = $module_handler->getModule('theme_color_palette')->getPath();
        
        //Set path to stylesheet
        $file_path = $moduel_path . "/css/theme-color-palette.css";
        
        //Instantiate style variables
        $background_color = '';
        $h2_color = '';
        $h3_color = '';
        $h4_color = '';
        $p_color = '';
        $a_color = '';
        $a_hover_color = '';
                
        foreach ($system_region as $region) {
            
            //Format region name as safe value
            $regionClean = preg_replace('/\W+/','_',strtolower(strip_tags($region)));
                        
            $this->config('theme_color_palette.theme_color_palette_settings')
            ->set($regionClean . '_background_color', $values[$regionClean . '_background_color']);
            $this->config('theme_color_palette.theme_color_palette_settings')
            ->set($regionClean . '_h2_color', $values[$regionClean . '_h2_color']);
            $this->config('theme_color_palette.theme_color_palette_settings')
            ->set($regionClean . '_h3_color', $values[$regionClean . '_h3_color']);
            $this->config('theme_color_palette.theme_color_palette_settings')
            ->set($regionClean . '_h4_color', $values[$regionClean . '_h4_color']);
            $this->config('theme_color_palette.theme_color_palette_settings')
            ->set($regionClean . '_p_color', $values[$regionClean . '_p_color']);
            $this->config('theme_color_palette.theme_color_palette_settings')
            ->set($regionClean . '_a_color', $values[$regionClean . '_a_color']);
            $this->config('theme_color_palette.theme_color_palette_settings')
            ->set($regionClean . '_a_hover_color', $values[$regionClean . '_a_hover_color'])->save();
            
            //Format region name for css class
            $regionClass = preg_replace('/_/','-',$regionClean);

            //Create region background styles
            $background_color .= '#' . $regionClass . " { background-color: " . $values[$regionClean . '_background_color'] . "; }\n";
            //Create text color styles
            $h2_color .= '#' . $regionClass . " h2 { color: " . $values[$regionClean . '_h2_color'] . "; }\n";
            $h3_color .= '#' . $regionClass . " h3 { color: " . $values[$regionClean . '_h3_color'] . "; }\n";
            $h4_color .= '#' . $regionClass . " h4 { color: " . $values[$regionClean . '_h4_color'] . "; }\n";
            $p_color .= '#' . $regionClass . " p { color: " . $values[$regionClean . '_p_color'] . "; }\n";
            //Create link color styles
            $a_color .= '#' . $regionClass . " a { color: " . $values[$regionClean . '_a_color'] . "; }\n";
            $a_hover_color .= '#' . $regionClass . " a:hover { color: " . $values[$regionClean . '_a_hover_color'] . "; }\n";
            
            //Put all the styles together
            $content = $background_color . $h2_color . $h3_color . $h4_color . $p_color . $a_color . $a_hover_color;
            
        }
        
        //Write/rewrite the stylesheet with the styles above
        $file = fopen($file_path, "w");
        fwrite($file, $content);
        fclose($file);
        
        parent::submitForm($form, $form_state);
        
    }

}