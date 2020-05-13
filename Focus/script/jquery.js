$(document).ready(function(){
    $(document).on('click','legend',function(){
        var name = $(this).attr('id');
         if(name == "title_legend"){
            return;
         }
         var lastChar = name.substring(name.indexOf('-') + 1);
         if($(this).next().is(":hidden") && name != "title_legend" ){
             $(this).next().show();
             $(this).css({width: "auto"});
             $(this).parent().css({border: "groove"});
         }else{
             $(this).next().hide();
             $(this).css({width: "100%"});
             $(this).parent().css({border: "none"});
         }
    });
    $(document).on('click','#save',function(){
        var lastField = $("fieldset:last-of-type").attr('id');
        var lastChar = lastField.substring(lastField.indexOf('-') + 1);
        lastChar = Number(lastChar) + 1 ;
        var newField = document.createElement("fieldset");
        var legend_field = document.createElement("legend");
        var div_1 = document.createElement("div");
        var div_2 = document.createElement("div");
        var div_3 = document.createElement("div");
        var div_4 = document.createElement("div");
        var divX = document.createElement("div");
        var br1 = document.createElement("br");
        var br2 = document.createElement("br");
        br1.setAttribute("class","unselectable");
        br2.setAttribute("class","unselectable");
        newField.setAttribute("id","field-"+lastChar);
        divX.setAttribute("id","section-"+lastChar);
        // Legend
        legend_field.innerHTML = "Chapter "+lastChar;
        legend_field.setAttribute("id","legend-"+lastChar);
        legend_field.setAttribute("class","unselectable");
        //Div 1 
        var span1 = document.createElement("span");
        var in1 = document.createElement("input");
        span1.setAttribute("id","title_spn");
        span1.setAttribute("class","unselectable");
        span1.innerHTML = "Title";
        in1.setAttribute("type","text");
        in1.setAttribute("id","input_title");
        div_1.setAttribute("id","div1");
        div_1.append(span1);
        div_1.append(in1);
        //Div 2
        var span2 = document.createElement("span");
        var paragraph = document.createElement("textarea");
        span2.setAttribute("id","description_spn");
        span2.setAttribute("class","unselectable");
        span2.innerHTML = "Description";
        div_2.setAttribute("id","div2");
        div_2.append(span2);
        div_2.append(paragraph);                    
        //Div 3
        var span3 = document.createElement("span");
        var input_sec = document.createElement("input");
        var img1 = document.createElement("img");
        var img2 = document.createElement("img");
        span3.setAttribute("id","section_spn");
        span3.setAttribute("class","unselectable");
        span3.innerHTML="Add Section 1";
        input_sec.setAttribute("type","text");
        input_sec.setAttribute("id","input_section_default");
        input_sec.setAttribute("class","class_section");
        input_sec.setAttribute("class","unselectable");
        img1.setAttribute("src","img/Delete.png");
        img1.setAttribute("id","img_dlt");
        img1.setAttribute("class","unselectable");
        img2.setAttribute("src","img/a (2).png");
        img2.setAttribute("id","img_add");
        img2.setAttribute("class","unselectable");
        div_3.setAttribute("id","div3");
        div_3.append(span3);
        div_3.append(input_sec);
        div_3.append(img1);
        div_3.append(img2);
        //Div 4
        var btn_go = document.createElement("input");
        btn_go.setAttribute("type","button");
        btn_go.setAttribute("id","save_chap");
        btn_go.setAttribute("value","Save");
        div_4.setAttribute("id","div4");
        div_4.append(btn_go);
        //Fieldset
        divX.append(div_1);
        divX.append(div_2);
        divX.append(div_3);
        divX.append(div_4);
        newField.append(legend_field);
        newField.append(divX);
        $("fieldset:last-of-type").after(newField);
        div_4.before(br2);
        $("fieldset:last-of-type").before(br1);
    });
    $(document).on('click','#img_add',function(){
        var div = document.createElement("div");
        var spn = document.createElement("span");
        var inp = document.createElement("input");
        var img1 = document.createElement("img");
        var img2 = document.createElement("img");
        div.setAttribute("id","div3");
        spn.setAttribute("id","section_spn");
        spn.setAttribute("class","unselectable");
        inp.setAttribute("type","text");
        img1.setAttribute("src","img/Delete.png");
        img1.setAttribute("id","img_dlt");
        img1.setAttribute("class","unselectable");
        inp.setAttribute("class","class_section");
        img2.setAttribute("src","img/a (2).png");
        img2.setAttribute("id","img_add");
        img2.setAttribute("class","unselectable");
        div.append(spn);
        div.append(inp);
        div.append(img1);
        div.append(img2);
        //var nbr_section = $(this).parent().parent().children().length - 3 ;
        var index = 2 ;
        var i = 1;
        $(this).parent().after(div);
        while($(this).parent().parent().children().eq(index).length){
            if($(this).parent().parent().children().eq(index).attr('id') == "div4"){
                return;
            }
            //console.log($(this).parent().parent().children().eq(index).attr('id'));
            $(this).parent().parent().children().eq(index).find("span").text("Add Section "+i);
            if(i==1){
                $(this).parent().parent().children().eq(index).find("input").attr("id","input_section_default");
            }else if(i<10){
                $(this).parent().parent().children().eq(index).find("input").attr("id","input_section_default");
            }else{
                $(this).parent().parent().children().eq(index).find("input").attr("id","input_section_p10");
            }
            i = i +1;
            index = index + 1;
        }
        //console.log($(this).parent().parent().children().eq("2").find("span").attr("id"));       
    });
    $(document).on('click',"#img_dlt",function(){
        var nbr_section = $(this).parent().parent().children().length - 5 ;
        var nbr_dlt = $(this).parent().find("span").html() ;
        var ix =  nbr_dlt[nbr_dlt.length -1];
        ix = Number(ix);
        var swap  = true; 
        if(nbr_section == 0){
          return;
        }
        var index = 2;
        var i = 1;
        var Keep = $(this).parent().parent().children() ; 
        $(this).parent().remove();
        while(Keep.eq(index).length && Keep.eq(index).attr('id') == "div3"){
            if(ix == 1 && swap && i == 1){
                swap = false;
                index = index + 1;
            }else{
                if(Keep.eq(index).attr('id') == "div4"){
                return;
                }
                $(Keep.eq(index).find("span").text("Add Section "+i));
                if(i==1){
                    $(Keep.eq(index).find("input").attr("id","input_section_default"));
                    //$(Keep.eq(index).find("input").attr("id","input_section_m10"));
                }else if(i<10){
                    $(Keep.eq(index).find("input").attr("id","input_section_default"));
                }else{
                    $(Keep.eq(index).find("input").attr("id","input_section_p10"));
                }
                i = i + 1;
                index = index + 1;
                if(ix == i && swap ){
                    i = i - 1 ;
                    swap = false;
                }
            }
        }
    });
    $(document).on('click','#save_chap',function(){
        var title = $(this).parent().parent().children().find("#input_title").val();
        var desc = $(this).parent().parent().children().find("textarea").val();
        var nbr_chap1 = $(this).parent().parent().attr('id');
        var id_course = $("#id_crs").val();
        nbr_chap1 = nbr_chap1.split('-');;
        var nbr_chap = nbr_chap1[nbr_chap1.length - 1];
        var section = '';
        var index = 2;
        while($(this).parent().parent().children().eq(index).length && $(this).parent().parent().children().eq(index).attr('id') == "div3"){
            section = section + $(this).parent().parent().children().eq(index).find(".class_section").val() ;
            if($(this).parent().parent().children().eq(index+1).length && $(this).parent().parent().children().eq(index+1).attr('id') == "div3"){
                section = section+ '-';
            }
            index = index + 1;
        }
        if($(this).parent().parent().children().eq(2).length && $(this).parent().parent().children().eq(2).attr('id') == "div3"){
            if($(this).parent().parent().children().eq(3).attr('id') != "div3"){
                section = $(this).parent().parent().children().find("#input_section_default").val();
            }
        }
        console.log("ddk"+section);
        $.ajax({
            url: "php/chapterToDb.php",
            data: 
            {
                title: title,
                desc: desc,
                nbr_chap: nbr_chap,
                id_course : id_course,
                section: section
            },
            /*success: function(data){
                $("#po").html(data);
            }*/
        });   
    });
    $(document).on('click',".close_png",function(){
        $(this).parent().parent().hide();
    });
    $(document).on('click',"#section_spn",function(){
        var me = $(this);
        var index_vid = $(this).text();
        index_vid = index_vid.split(" ").pop();
        index_vid = index_vid.trim();
        var index_chap = $(this).parent().parent().attr('id');
        index_chap = index_chap.split("-").pop();
        var id_course = $("#id_crs").val().trim();
        $("#popup-course-id").val(id_course+'-'+index_chap+'-'+index_vid);
        var result = null;
        //alert(index_vid+'/'+index_chap+'/'+id_course);
        $.ajax({
            url: "php/SectionToDb.php",
            type: "GET",
            data: 
            {
                id_course: id_course,
                index_chap: index_chap,
                index_vid: index_vid,
            },
            success: function(data){
                if(data === 'Nothing'){
                    alert('You need to insert Data First');
                    console.log('Inside Ajax-'+result);
                }else{
                    $("div:last-of-type").show();
                    result = data.charAt(0).toUpperCase() + data.slice(1);
                    $(".popup-title").text(result);
                    console.log('Inside Ajax.'+data);
                }
            }
        });
    });
    $(document).on('click','#popup-btn',function(){
        var file = document.getElementById("my-file-v").files[0];
        var name = $("#my-file-v").val();
        var ex = name.split(".");
        var exetension = ex[1];
        var formData = new FormData();
        var field = $('#popup-course-id').val();
         if(name == ''){
            alert("No");
            return;
        }
        if(exetension != 'mp4'){
            alert("chose video");
            return;
        }
        field = field.split("-");
        var ind_vid = field[2];
        var ind_chp = field[1];
        var ind_crs = field[0];
        formData.append("file_video",file);
        formData.append("id_course",ind_crs);
        formData.append("index_vid",ind_vid);
        formData.append("chapter_idx",ind_chp);
        // alert(ind_chp);
        var ajax = new XMLHttpRequest();
        //ajax.upload.addEventListener("progress","progressHandler",false);
        //ajax.addEventListener("load","completeHandler",false);
        //ajax.addEventListener("error","errorHandler",false);
        //ajax.addEventListener("abort","abortHandler",false);
        ajax.open("POST","php/VideoToDb.php");
        ajax.send(formData);
        
    });
    function completeHandler(event){
        console.log('imhere');
        document.getElementById("progress_vid").value = 10;
    }
});