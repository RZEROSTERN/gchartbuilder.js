<?php

    /**
     * GoogleChartDataModel
     * So, there's no Zelda without Link. Just like that, GChartGen cannot work without a data model.
     * You must use this data model for building via AJAX your Google arrays and get a fancy graphic :D.
     *
     * @package data
     * @author RZEROSTERN
     * @license same as GChartBuilder.js
     */
    class GoogleChartDataModel
    {
        private $gdata;

        /**
         * constructor
         * Creates the Google array that will be fetched in JSON for the chart.
         */
        public function __construct(){
            $this->gdata['cols'] = array();
            $this->gdata['rows'] = array();
        }

        /**
         * add_column
         * Adds a column to the main array
         *
         * @param $id Identifier of the column (variable name, required)
         * @param $label Name of the column (pretty name, required)
         * @param string $pattern Pattern used for many variable types like monetary vars. (optional)
         * @param string $type Variable type, if is not defined, it'll get number as default.
         * @param string $p CSS override for the column (optional)
         */
        public function add_column($id, $label, $pattern = "", $type = "number", $p = ""){
            array_push($this->gdata['cols'],
                array('id'=>$id, 'label'=>$label, 'pattern'=>$pattern, 'type'=>$type, 'p'=>$p)
            );
        }

        /**
         * add_row
         * Adds a row to the main array
         *
         * @param $name Name of the row (required).
         * @param ... You may insert as many parameters as you need. The method will recognize a single call as a row.
         */
        public function add_row($name){
            $args = func_num_args();
            $tmpRow = array("c" => array());
            for($i = 0; $i < $args; $i++){
                $tmpRow['c'][$i]['v'] = func_get_arg($i);

                if($i == $args - 1){
                    array_push($this->gdata['rows'], $tmpRow);
                }
            }
        }

        /**
         * render_array
         * Renders the array as a normal way
         *
         * @return The main array rendered as a normal way.
         */
        public function render_array(){
            return $this->gdata;
        }

        /**
         * render_json
         * Renders the array as a JSON string
         *
         * @return string JSON converted string
         */
        public function render_json(){
            return utf8_decode(json_encode($this->gdata));
        }
    }
?>