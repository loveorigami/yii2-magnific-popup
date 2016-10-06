<?php
namespace lo\widgets\magnific;

use Yii;
use yii\base\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\JsExpression;

class MagnificPopup extends Widget
{
    /**
     * Jquery selector to which element should apply the magnific-popup.
     * @var string jQuery Selector
     */
    public $target;
    
    /**
     * Options in the documentation for magnific-popup
     * @see http://dimsemenov.com/plugins/magnific-popup/documentation.html
     * @var array Magnific-Popup Option
     */
    public $options = [];
    
    /**
     * @var type 
     */
    public $defaultOptions = [
        'type' => 'image'
    ];
    /**
     * Language for internationalization.
     * Null for auto detect.
     * @var string 
     */
    public $language;
    
    /**
     * Effects in http://codepen.io/dimsemenov/pen/GAIkt
     * @var string 
     * ***** LIST OF Avilable value
     * 'fade', 'with-zoom', 'zoom-in', 'newspaper',    'move-horizontal', 'move-from-top', '3d-unfold', 'zoom-out'
     */
    public $effect;
    
    /**
     * Alias for 'type' in option;
     * 
     * <li>ajax</li>
     * <li>iframe</li>
     * <li>image</li>
     * <li>inline</li>
     * 
     * @var type string
     */
    public $type;
       
    /**
     * Run this widget.
     * This method registers necessary javascript.
     */
    public function run() {
        $effectList = ['fade', 'with-zoom', 'zoom-in', 'newspaper',
            'move-horizontal', 'move-from-top', '3d-unfold', 'zoom-out'
        ];
        
        if ($this->effect && in_array($this->effect, $effectList)) {
            $this->defaultOptions['mainClass'] = 'mfp-' . $this->effect;
            $this->defaultOptions['removalDelay'] = 500;
            $this->defaultOptions['callbacks'] = [
                'beforeOpen' => new JsExpression("function() {this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure mfp-with-anim');}")
            ];
            if ($this->effect == 'with-zoom') {
                $this->defaultOptions = array_merge($this->defaultOptions, [
                    'zoom' => [
                        'enabled' => true,
                    ],
                ]);
            }
        }
        
        if ($this->type !== null) {
            $this->options['type'] = $this->type;
        }
        
        $options = array_merge($this->defaultOptions, $this->options);
        $js = "jQuery('{$this->target}').magnificPopup(" . Json::encode($options) . ");";
		
		$view = $this->getView();
        MagnificPopupAsset::register($view);
        $view->registerJs($js);
    }
}