<?php

namespace Drupal\mwheather\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormInterface;
use Drupal\Component\Serialization\Json;
/**
 * Provides a 'wheather form' block.
 *
 * @Block(
 *   id = "wheather_block",
 *   admin_label = @Translation("Wheather Block"),
 *   category = @Translation("shows wheather information of city")
 * )
 */

class WheatherBlock extends BlockBase{
    public function build() {
        $config = \Drupal::config('mwheather.settings');
        $appids= $config->get('appid');
      
        $service = \Drupal::service('mwheather.myservice');
        $ress = $service->get_wheather_data('pune');
        $re = Json::decode($ress);
        print_r('hello '.$ress);
        //kint($re);

        $form['appid'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('App Id : '), 
            '#value' => $this->t($appids),  
          ];
        $form['temp_min'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('temp_min : '), 
            '#value' => $this->t((string) $re['main']['temp_min']),
        ];  
        $form['temp_max'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('temp_max : '),
            '#value' => $this->t((string) $re['main']['temp_max']), 
        ];
        $form['pressure'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('pressure : '),
            '#value' => $this->t((string) $re['main']['pressure']),   
        ];
        $form['humidity'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('humidity : '),  
            '#value' => $this->t((string) $re['main']['humidity']),
        ];
        $form['wind -> speed'] = [  
            '#type' => 'textfield',  
            '#title' => $this->t('wind -> speed : '), 
        ];
        return $form;
    }
}