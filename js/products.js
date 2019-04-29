$(document).ready(function() {    
    var def = true;
    var orderParameter = "";
    var temp = "";
    var loadButtonDis = true;
    var currentPage = 1;
    var adimnEn = false;
    var messageId = 0;
    messageEn = true;
    loadContent(" ",currentPage);

    $("#admin").click(function() {
        if(adimnEn == false) {
            adimnEn = true;
            $('.removeProduct').show();
            $('html, body').animate({
                scrollTop: $("#searchButton").offset().top
            }, 800, function(){});
            $("#admin").addClass("burningText");
        }
        else {
            adimnEn = false;        
            $('.removeProduct').hide();
            $("#admin").removeClass("burningText");
        }
    })

    function message(type,text) {
        $("#notifyBlock").prepend("<div class='messageNotify' id='messageNotId"+messageId+"'><div id='notifyType"+messageId+"' class ='notifyMessage'></div><div class='notifyText' id='notifyText"+messageId+"'>"+text+"</div>");
        if (type == 'error') $("#notifyType"+messageId).css({content:"url(../img/error.png)"});
        else if (type == 'info') $("#notifyType"+messageId).css({content:"url(../img/info.png)"});
        else if (type == 'success') $("#notifyType"+messageId).css({content:"url(../img/success.png)"});
        if (text == "Product was deleted ༼ つ ◕_◕ ༽つ") $("#notifyText"+messageId).css("font-size","16px");
        removeMessage(messageId);
        messageId++;
    }

    function removeMessage(messageId) {
        setTimeout(function() {
            $("#messageNotId"+messageId).remove().fadeOut();
        }, 3000);
    }

    $("#scetch").click(function() {
        if ($('#scetchli').hasClass("activeCategory")) {
            $("#product").empty();            
            $("#scetchli").removeClass("activeCategory");
            orderParameter = "";
            currentPage = 1;
            var searchParam = $("#searcInp").val();
            if (searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage);
        }
        else {
            $("#scetchli").addClass("activeCategory");
            $("#artsli").removeClass("activeCategory");
            $("#texturesli").removeClass("activeCategory");
            $("#spritesli").removeClass("activeCategory");
            orderParameter = "Scetch";
            $("#product").empty();
            currentPage = 1;
            var searchParam = $("#searcInp").val();
            if(searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage);
            $('html, body').animate({
                scrollTop: $("#searchButton").offset().top
              }, 800, function(){});
        }
    })
    $("#arts").click(function() {
        if (!$('#artsli').hasClass("activeCategory")) {
            $("#product").empty();              
            $("#artsli").addClass("activeCategory");
            $("#scetchli").removeClass("activeCategory");
            $("#texturesli").removeClass("activeCategory");
            $("#spritesli").removeClass("activeCategory");
            orderParameter = "Arts";
            currentPage = 1
            var searchParam = $("#searcInp").val();
            if (searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage); 
            $('html, body').animate({
                scrollTop: $("#searchButton").offset().top
            }, 800, function(){});
        }
        else {
            $("#artsli").removeClass("activeCategory");
            orderParameter = "";
            $("#product").empty();
            currentPage = 1;
            var searchParam = $("#searcInp").val();
            if(searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage);
        }
    })
    $("#textures").click(function() {
        if (!$('#texturesli').hasClass("activeCategory")) {
            $("#texturesli").addClass("activeCategory");
            $("#scetchli").removeClass("activeCategory");
            $("#artsli").removeClass("activeCategory");
            $("#spritesli").removeClass("activeCategory");
            orderParameter = "Textures";
            $("#product").empty();
            currentPage = 1;
            var searchParam = $("#searcInp").val();
            if(searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage);
            $('html, body').animate({
                scrollTop: $("#searchButton").offset().top
            }, 800, function(){});
        }
        else {
            $("#texturesli").removeClass("activeCategory");
            orderParameter = "";
            $("#product").empty();
            currentPage = 1;
            var searchParam = $("#searcInp").val();
            if (searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage);
        }
    })
    $("#sprites").click(function() {
        if (!$('#spritesli').hasClass("activeCategory")) {
            $("#spritesli").addClass("activeCategory");
            $("#scetchli").removeClass("activeCategory");
            $("#artsli").removeClass("activeCategory");
            $("#texturesli").removeClass("activeCategory");
            orderParameter = "Sprites";
            $("#product").empty();
            currentPage = 1;
            var searchParam = $("#searcInp").val();
            if (searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage); 
            $('html, body').animate({
                scrollTop: $("#searchButton").offset().top
          }, 800, function(){});
        }
        else {
            $("#spritesli").removeClass("activeCategory");
            orderParameter = "";
            $("#product").empty();
            currentPage = 1;
            var searchParam = $("#searcInp").val();
            if(searchParam=="") searchParam=" ";
            loadContent(searchParam,currentPage);
        }
    })    
    $( "#loadMore" ).click(function() {
        if (loadButtonDis == true) {
            loadButtonDis = false;
            $("#loadMore").empty();
            $("#loadMore").removeClass("loadimg");
            $("#loadMore").addClass("loaderAnim");
            setTimeout(loadDelay, 800);                    
        }
        function loadDelay() {
            $("#loadMore").removeClass("loaderAnim");
            $("#loadMore").addClass("loadimg");
            $("#loadMore").append("<div  class = 'loadimg'></div>");
            currentPage++;
            var searchParam = $("#searcInp").val();
            if (searchParam == "") searchParam = " ";
            loadContent(searchParam,currentPage);
            loadButtonDis = true;
        }
    });

    $('#searchButton').on('click', expand);
    function expand() {    
        $(".search").toggleClass("closeZ");
        $(".input-search").toggleClass("square");
        if ($('.search').hasClass('closeZ')) {
            $('html, body').animate({
                scrollTop: $("#searchButton").offset().top
            }, 800, function(){});
            $('.input-search').css("pointer-events", "auto");
            $('.input-search').focus();
            $("#searchButton").attr("disabled",true);
            setTimeout(function(){
                $("#searchButton").attr("disabled",false);
            }, 600);
            setTimeout(function(){$("#searcInp").attr("placeholder","search");}, 800);
        }
        else {
            $("#searcInp").attr("placeholder","");
            $(".input-search").val("");
            $('.input-search').css("pointer-events", "none");
            $('.input-search').blur();
            $("#searchButton").attr("disabled",true);
            setTimeout(function() {
                $("#searchButton").attr("disabled",false);  
            }, 800);
            if(def === false) {
                $("#product").empty();                  
                currentPage = 1;
                loadContent(" ",currentPage);
            } 
        }
    }

    $("#searcInp").keyup(function(e) {
        var searchParam = $("#searcInp").val();
        currentPage = 1;
        if (searchParam !== "") {
            if (e.which !== 32  ) {
                $("#product").empty();
                currentPage = 1;
                loadContent(searchParam,currentPage);
                def = false;
            }
        }
        else if (def == false) {
            def = true;
            $("#product").empty();  
            currentPage = 1;
            loadContent(" ",currentPage); 
        }
    })

    function loadContent(searchParam,currentPage) {
        var scrollActive = true;
        var sum = 0;
        var sasha = 1640;
        if(currentPage == 1)$('#body-products').css({"height":+sasha+ "px"});
        $('#body-products').css({" padding-bottom": "0.1px"});
        $.ajax({ url: '../php/products.php',
         data: {
             searchAction: searchParam,
             page: currentPage,
             orderParameter, orderParameter,
        },
         type: 'post',
         success: function(output) {
            var data = $.parseJSON(output);
            if (data[2] !== 0) {
                $("#loadMore").show();
            }
            else {
                $("#loadMore").hide();
            }
            if(data[3] < 6 && currentPage == 1) {
                $('#body-products').css({"padding-bottom": "50px"});
                $("#loadMore").hide();
            }
            if (data[2] == 0 && currentPage == 1) {
                $("#loadMore").hide();
                $("#product").empty();
                $("#product").append("<div id='boring' class='boring'></div><div class='dontFind'>No Content Found</div>");
                $('#body-products').css({"padding-bottom": "30px"});
                $('#body-products').css({"height": "auto"});
            }
            
            else if (data[2] == 0 && currentPage !== 1) {
                $("#loadMore").hide();
                $("#product").append("<div class='noMoreText'>No More Product</div><div class='noMore'></div>");
                $('#body-products').css({"padding-bottom": "0px"});
                $('#body-products').css({"height": "auto"});
                $('html, body').animate({
                    scrollTop: $(".noMoreText").offset().top
                  }, 800, function(){
                  });
            }
            if(data[2] !== 0) {
                $("#product").css("visibility","hidden");
                for (var i = 0; i < data[2] ;i++) {
                    if (i == 0 && currentPage == 1) {
                        $("#product").append("<div id='addNewProd' class = 'removeProduct addButt'></div>");
                        $("#product").append("<div id = 'flexer' class = 'flexMe'></div>");                        
                        $( "#flexer" ).append( "<div id = 'image"+data[0][i]['id']+"' value = '"+data[0][i]['id']+"' class = 'margS imgmarg' ><div class='outer-div'><img  class = 'productImg' id = 'img"+data[0][i]['id']+"' src  = '"+data[0][i]['image']+"'  ></div><div id='sBox' class = 'sBox'><div id = 'title"+data[0][i]['id']+"' class = 'text '>"+data[0][i]['title']+"</div><div id = 'cost"+data[0][i]['id']+"' class = 'cost '>$"+data[0][i]['cost']+"</div> <div div id = 'categoryProduct"+data[0][i]['id']+"'  class='categoryProduct'>"+data[0][i]['category']+"</div> <button id ='buy"+data[0][i]['id']+"' class = 'buy'></button><div class = 'flexeree'><div id='editeMeimg"+data[0][i]['id']+"' class='removeProduct editImg'></div><div id='closeMeimg"+data[0][i]['id']+"' class='removeProduct' >×</div></div></div>");
                        temp = data[0][i]['id'];
                    }
                    if( (i !== 0 && currentPage == 1) || currentPage > 1 ) { 

                        $( "#image"+temp).clone().attr("id", "image"+data[0][i]['id']).appendTo("#flexer");    
                        $("#image"+data[0][i]['id']).find("#img"+temp).attr("id", "img"+data[0][i]['id']);
                        $("#image"+data[0][i]['id']).find("#img"+data[0][i]['id']).attr("src", data[0][i]['image']);
                        $("#image"+data[0][i]['id']).find("#buy"+temp).attr("id", "buy"+data[0][i]['id']);
                        $("#image"+data[0][i]['id']).find("#closeMeimg"+temp).attr("id", "closeMeimg"+data[0][i]['id']);                
                        $("#image"+data[0][i]['id']).find("#editeMeimg"+temp).attr("id", "editeMeimg"+data[0][i]['id']);
                        $("#image"+data[0][i]['id']).find("#title"+temp).attr("id", "title"+data[0][i]['id']);
                        $("#image"+data[0][i]['id']).find("#categoryProduct"+temp).attr("id", "categoryProduct"+data[0][i]['id']);
                        $("#image"+data[0][i]['id']).find("#cost"+temp).attr("id", "cost"+data[0][i]['id']);
                        $("#image"+data[0][i]['id']).find("#title"+data[0][i]['id']).text(data[0][i]['title']);
                        $("#image"+data[0][i]['id']).find("#categoryProduct"+data[0][i]['id']).text(data[0][i]['category']);
                        $("#image"+data[0][i]['id']).find("#cost"+data[0][i]['id']).text("$"+data[0][i ]['cost']);
                    }
                    if (i >= 0 && i < 4 && currentPage > 1 && scrollActive == true ) {
                        scrollActive = false;
                        $('html, body').animate({
                            scrollTop: $("#image"+data[0][i]['id']).offset().top
                        }, 800, function(){});
                    }
                    
                    $("img").on('error',function() {
                        $(this).attr( "src", "../img/no-product-image.gif" );
                        })
                    $("#closeMeimg"+data[0][i]['id']).click(function(){
                        var tempid = this.id;
                        var convertedid = tempid.substring(10);
                        var id = parseInt(convertedid);
                        removeProduct("delete",id);
                        
                        message('success',"Product was deleted ༼ つ ◕_◕ ༽つ");
                    })

                    $("#editeMeimg"+data[0][i]['id']).click(function() {
                        updateAAA = true;
                        var tempid = this.id;
                        updProd = true;
                        var convertedid = tempid.substring(10);
                        var id = parseInt(convertedid);
                        CurrProductId = id ;
                        var img1 = $("#img"+id).attr("src");
                        var title = $("#title"+id).text();
                        var cost = $("#cost"+id).text();
                        var category = $("#categoryProduct"+id).text(); 
                        finallCost = parseInt(cost.substring(1));
                        $("#categorySelect").val(category);
                        $("#title").val(title);
                        $("#costzz").val(''+finallCost);
                        $("#previewProduct").css({content:"url("+img1+")"});            
                        $('body').addClass('stop-scrolling');
                        $('#modal-container05').show();
                    })
                    $("#addNewProd").click(function() {
                        updateAAA = false;
                        updProd = false;
                        CurrProductId = null;
                        title = null;
                        cost = null;
                        category = null;
                        $("#categorySelect").val("Arts");
                        $("#title").val("");
                        $("#costzz").val("");
                        $("#previewProduct").css({content:"url(../img/no-product-image.gif)"});            
                        $('body').addClass('stop-scrolling');
                        $('#modal-container05').show();
                    })
                    $("#buy"+data[0][i]['id']).click(function() {
                        if(!$("#superSum").length) {
                            sum = 0;
                        }
                        if (!$("#dropdown-row").length) {
                        message('info','You Must LogIn for buy this thing :P');
                        }
                        else {
                            var id = this.id.substring(3);        
                            if ($("#busket-elements").find("#image"+id).length) {
                                message('error','Product Already has been added :P');
                            }
                            else {
                                $('#busket-elements').css("height","400px");
                                var current ="#image" + id;
                                var costTemp = $(this).prev().prev().text();
                                var cost = costTemp.substring(1);
                                var costConverted = parseInt(cost);
                                var product = $(current).clone();
                                $(product).find(".buy").remove();
                                $(product).find(".removeProduct").remove()
                                $(product).appendTo("#busket-elements");
                                var idCurrent = $(product).attr("id");
                                $(product).append("<span id='closeMe"+idCurrent+"' class='delProd'>×</span>");
                                $(product).find(".text").css("width","240px")
                                $(product).find(".outer-div").css({"height":"250px","width":"250px"})
                                $(product).find("#sBox").css({"height":"77px","width":"230px"})
                                $(product).css("margin-bottom","-63px");
                                $(product).css("margin-top","23px");
                                sum +=costConverted;
                                $('#busket-total').empty();
                                $('#busket-total').append("<hr><h1 id='superSum' style='margin-left: 140px'>Total: $"+sum+"</h1>");
                                message('success','Product Added');
                                $("#closeMe"+idCurrent).click(function(){
                                    $('#busket-elements').find("#"+idCurrent).remove();
                                    sum-=costConverted;
                                    $('#busket-total').empty();
                                    $('#busket-total').append("<hr><h1 id='superSum' style='margin-left: 140px'>Total: $"+sum+"</h1>");
                                    if (sum <=0)
                                    {
                                        sum = 0;
                                        $("#busket-elements").empty();
                                        $("#busket-total").empty();
                                        $('#busket-message').append("<h1 style='margin-left:40px'>Shopping Card Is Empty :C</h1>");
                                        $('#busket-elements').css({"height":"0"});
                                        $('#shoppingcard-buy').css("display","none");
                                        $('#superSum').remove();

                                    }
                                });
                            }    
                        }
                    });
                    $('#body-products').css({"height": "auto"});
                    if(adimnEn == true) {
                        $('.removeProduct').show();
                    }
                    else {
                        $('.removeProduct').hide();
                    }            
                }
                $("#product").css("visibility","visible");
                if (!$("body").find("#dropdown-row").length) $('.buy').css('opacity', '0.5');
                else $('.buy').css('opacity', '1.0');
            }
        }
        })
    }
    
    fileChanged = false;
        $( "#uploadImageProd" ).change(function() {
            fileChanged = true;
        })
        $("#form2").on('submit',(function(e) {
            e.preventDefault();
            var title = $('#title').val();
            var cost = $('#costzz').val();
            var category = $('#categorySelect').val();
            var formData = new FormData($('#form2')[0]);
            formData.append('image', $('input[type=file]')[0].files[0]);
            formData.append("title",title);
            formData.append("cost",cost);
            formData.append("category",category);
            formData.append('id',CurrProductId);
            formData.append('fileChanged',fileChanged);
            if(updProd == false) {
                formData.append('action',"addProduct");            
            }
            else if (updProd == true) {
                formData.append('action',"updateProduct");
            }
            $.ajax({
                url: "../php/admin.php",
                type: "POST",
                data:  formData,
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function()
                {
                    $("#modal-message05-1").fadeOut();
                },
                success: function(output)
                {
                    var data = $.parseJSON(output);
                    if(updProd ==  false && data[0]=="Image is added :3")
                    {
                        $("#form2")[0].reset();
                        fileChanged = false;
                        $("#title").val("");
                        $("#costzz").val("");
                        $("#categorySelect").val("Arts");
                        $("#product").empty();                  
                        loadContent(" ",1);
                    }
                    else if (updProd == true) {
                            if(fileChanged == true) {
                                $("#form2")[0].reset();
                                fileChanged = false;
                                if(data[2] == false) {
                                $("#previewProduct").css({content:"url("+data[1]+")"}).fadeIn();
                                $("#img"+CurrProductId).css({content:"url("+data[1]+")"});
                                }
                            }
                            if(data[2] == false) {
                            $("#title"+CurrProductId).text($("#title").val());
                            $("#cost"+CurrProductId).text("$"+$("#costzz").val());
                            $("#categoryProduct"+CurrProductId).text($('#categorySelect').val());
                            }
                        }
                    $("#modal-message05-1").text(data[0]).fadeIn();
                },
        });
        }));

    function removeProduct(action,id) {
        $.ajax({ url: '../php/admin.php',
                data: {
                    action: action,
                    id: id,
                },
                type: 'post',
                success: function() {
                        $("#image"+id).remove();
                        $("#product").empty();                  
                        loadContent(" ",1);

                    }
            })
    }
});