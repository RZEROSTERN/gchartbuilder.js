/**
 *	Google Chart Builder
 * 	jQuery plugin for building Google Charts graphics
 *
 *	@author RZEROSTERN
 *  @version 0.3
 *
 *  ----------------------------------------------------------------------------
 *  Only for Talachas Masterplan (@yagarasu, @TijoMONSTER, @T1niebl4zz, @aliasonix):
 *
 *  "THE BEER-WARE LICENSE" (Revision 42):
 *
 *  RZEROSTERN wrote this file. As long as you retain this notice you
 *  can do whatever you want with this stuff. If we meet some day, and you think
 *  this stuff is worth it, you can buy me a beer in return
 *  ----------------------------------------------------------------------------
 *
 */
(function($){
    $.fn.extend({
        gchart_testing:function(){
            var $this = $(this);
            var id = $this.attr("id");
            $("#" + id).append("This is the node where your graphic should be embedded.");
        },
        gchart_make_chart:function(graphicname, p_serializeddata, p_width, p_height){
            var $this = $(this);
            var method = 'post';
            var width = '100%';
            var height = 'auto';
            var serializeddata = '';
            var chart = undefined;

            if($this.data('method') != undefined && $this.data('method') != ""){
                method = $this.data('method');
            }

            if(p_width != undefined && p_width != ""){
                width = p_width;
            }

            if(p_height != undefined && p_height != ""){
                height = p_height;
            }

            if(p_serializeddata != undefined && p_serializeddata != ""){
                serializeddata = p_serializeddata;
            }

            if($this.data('graphictype') != undefined && $this.data('urldata') != undefined){
                if($this.data('graphictype') == ""){ throw new Error('Graphic type is required.', -2); }
                if($this.data('urldata') == ""){ throw new Error('URI Data is required', -3)}

                try{
                    google.setOnLoadCallback(function(){
                        $.ajax({
                            url:$this.data('urldata'),
                            dataType:'json',
                            type:method,
                            data:serializeddata,
                            success:function(result){
                                var google_data = new google.visualization.DataTable(result);
                                var google_options = {
                                    'title':graphicname,
                                    'width':width,
                                    'height':height
                                };

                                switch($this.data('graphictype')){
                                    case "BarChart":
                                        chart = new google.visualization.BarChart($this[0]);
                                    break;
                                    case "ColumnChart":
                                        chart = new google.visualization.ColumnChart($this[0]);
                                    break;
                                    case "AreaChart":
                                        chart = new google.visualization.AreaChart($this[0]);
                                    break;
                                    case "LineChart":
                                        chart = new google.visualization.LineChart($this[0]);
                                    break;
                                    case "PieChart":
                                        chart = new google.visualization.PieChart($this[0]);
                                    break;
                                    case "BubbleChart":
                                        chart = new google.visualization.BubbleChart($this[0]);
                                    break;
                                }

                                chart.draw(google_data, google_options);
                            },
                            error:function(xhr, o, msg){
                                $this.append("<div class='error'></div><p>There is an error calling the AJAX method.</p><p>" + msg + "</p>");
                            }
                        });
                    });
                } catch(error) {
                    $this.append("<div class='error'></div><p>There is an error while calling Google API. You must embed it before using this plugin.</p><p>" + error + "</p>");
                }
            } else {
                throw new Error('At least one required dataset is missing. You must declare data-graphictype or data-urldata in your node.', -1);
            }
        }
    });
})(jQuery);