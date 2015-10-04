function generatejquery(url)
{
    //console.log("ABCD");
    
    $(document).ready(function () {

            var search = $(".chintantablesearch").val();
            var pageno = 1;
            var orderby = "";
            var orderorder = "";
            var maxrow = 10;
            $(".drawchintantable .maxrow").val(maxrow);
            

            function fillchintandata() {
                $(".drawchintantable .loader").show();
                $.getJSON(url, {
                    search: search,
                    pageno: pageno,
                    orderby: orderby,
                    orderorder: orderorder,
                    maxrow:maxrow
                }, function (data) {

                    $(".drawchintantable table tbody").html("");
                    var result = data.queryresult;
                    for (var i = 0; i < result.length; i++) {
                        $(".drawchintantable table tbody").append(drawtable(result[i]));
                    }




                    $(".chintantablepagination ul.pagination").html("");
                    if (data.pageno != 1) {
                        $(".chintantablepagination ul.pagination").append('<li class="waves-effect"><a href="#" data-page="' + (data.pageno - 1) + '"><span aria-hidden="true">&laquo;</span></a></li>');
                    } else {
                        $(".chintantablepagination ul.pagination").append('<li class="disabled"><a href="#" data-page="' + (data.pageno) + '"><span aria-hidden="true">&laquo;</span></a></li>');
                    }

                    for (var i = 0; i < data.lastpage; i++) {
                        if ((i + 1) == data.pageno)
                            $(".chintantablepagination ul.pagination").append('<li class="active" ><a href="#" data-page="' + (i + 1) + '">' + (i + 1) + '</a>');
                        else
                            $(".chintantablepagination ul.pagination").append('<li class="waves-effect"><a href="#" data-page="' + (i + 1) + '">' + (i + 1) + '</a>');
                    }
                    if (data.pageno != data.lastpage) {
                        $(".chintantablepagination ul.pagination").append('<li class="waves-effect"><a href="#" data-page="' + (data.pageno + 1) + '"><span aria-hidden="true">&raquo;</span></a></li>');
                    } else {
                        $(".chintantablepagination ul.pagination").append('<li class="disabled"><a href="#" data-page="' + (data.pageno) + '"><span aria-hidden="true">&raquo;</span></a></li>');
                    }

                    $(".chintantablepagination ul.pagination li a").click(function () {
                        pageno = parseInt($(this).attr("data-page"));
                        fillchintandata();
                        return false;

                    });
                    var allpages=$(".chintantablepagination ul.pagination li a");
                    var totalwidth=0;
                    console.log("Length: "+allpages.length);
                    for(var i=0;i<allpages.length;i++)
                    {
                        totalwidth+=$(allpages).eq(i).width()+26;
                    }
                    $(".chintantablepagination ul.pagination").width(totalwidth);
//                    $(".chintantablepagination").css({"overflow-x": "scroll","height": "72px","overflow-y": "hidden"});

                    for (var i = 0; i < data.elements.length; i++) {
                        var element = data.elements[i];
                        $(".drawchintantable thead tr th[data-field='" + element.alias + "']").html(element.header);

                        if (element.sort == "ASC") {
                            $(".drawchintantable thead tr th[data-field='" + element.alias + "']").append("<button data-sort='DESC' class='btn chisorting pull-right blue darken-4 waves-effect waves-light z-depth-0'><i class='fa fa-sort-asc'></i></button>");
                        } else if (element.sort == "DESC") {
                            $(".drawchintantable thead tr th[data-field='" + element.alias + "']").append("<button data-sort='ASC' class='btn chisorting pull-right blue darken-4 waves-effect waves-light z-depth-0'><i class='fa fa-sort-desc'></i></button>");
                        } else if (element.sort == "1") {
                            $(".drawchintantable thead tr th[data-field='" + element.alias + "']").append("<button data-sort='ASC' class='btn chisorting pull-right blue darken-4 waves-effect waves-light z-depth-0'><i class='fa fa-sort'></i></button>");
                        }
                    }

                    $(".drawchintantable .chisorting").click(function () {
                        console.log("Clicked");
                        orderby = $(this).parents("th").attr("data-field");
                        orderorder = $(this).attr("data-sort");
                        maxrow=$(".drawchintantable select.maxrow").val();
                        fillchintandata();
                    });


                    $(".drawchintantable .loader").hide();

                });




            };

            $(".chintantablesearchgo").click(function () {
                search = $(".chintantablesearch").val();
                pageno = 1;
                maxrow=$(".drawchintantable select.maxrow").val();
                fillchintandata();
            });

            $(".chintantablesearchgo").click(function () {
                search = $(".chintantablesearch").val();
                pageno = 1;
                maxrow=$(".drawchintantable select.maxrow").val();
                fillchintandata();
            });
            $(".drawchintantable .maxrow").change(function () {
                search = $(".chintantablesearch").val();
                pageno = 1;
                maxrow=$(".drawchintantable select.maxrow").val();
                fillchintandata();
            });



            fillchintandata();
        
        
        
        
            


        });
}



function generatepiechart(texttitle, target, value) {
    $(target).highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 1, //null,
            plotShadow: false
        },
        title: {
            text: texttitle
        },
        tooltip: {
            pointFormat: '<b>{point.name}</b>:{point.y}  ({point.percentage:.1f} %)'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>:{point.y}  ({point.percentage:.1f} %)',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Browser share',
            data: value
        }]
    });
}

function filljsoninput(fromdiv,todiv) {
       
        var $from=$(fromdiv);
        var fromjson=JSON.parse($from.val());
        var $to=$(todiv);
        for(var i=0;i<fromjson.length;i++)
        {
            var fromj=fromjson[i];
            switch(fromj.type)
            {
                    case "text":
                    $to.append("<div class='form-group genfromjson'><label class='col-sm-2 control-label' for='normal-field'>"+fromj.label+"</label><div class='col-sm-4'><input type='text' json-type='"+fromj.type+"' json-class='"+fromj.classes+"' id='normal-field' placeholder='"+fromj.placeholder+"' class='form-control jsonelement "+fromj.classes+"' value='"+fromj.value+"'></div></div>");
                    break;
                    case "textarea":
                    $to.append("<div class='form-group genfromjson'><label class='col-sm-2 control-label' for='normal-field'>"+fromj.label+"</label><div class='col-sm-4'><textarea id='normal-field' json-type='"+fromj.type+"' json-class='"+fromj.classes+"' placeholder='"+fromj.placeholder+"' class='form-control jsonelement "+fromj.classes+"' >"+fromj.value+"</textarea></div></div>");
                    break;
                    
            }
            
        }
    }
    
    function jsonsubmit(todiv,fromdiv) {
        var $from=$(fromdiv).children(".genfromjson");
        var tojson=[];
        for(var i=0;i<$from.length;i++)
        {
            var $fromsin=$from.eq(i);
            var tosin={};
            //console.log($fromsin.html());
            tosin.label=$fromsin.children("label").text();
            console.log($fromsin.children("div").children(".jsonelement").attr("json-type"));
            tosin.type=$fromsin.children("div").children(".jsonelement").attr("json-type");
            tosin.classes=$fromsin.children("div").children(".jsonelement").attr("json-class");
            tosin.placeholder=$fromsin.children("div").children(".jsonelement").attr("placeholder");
            tosin.value=$fromsin.children("div").children(".jsonelement").val();
            tojson.push(tosin);
        }
        //console.log(tojson);
        $(todiv).val(JSON.stringify(tojson));
    }