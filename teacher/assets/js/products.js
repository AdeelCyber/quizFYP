
function app() {
    return {
        wysiwyg: null,
        init: function(el) {
            // Get el
            this.wysiwyg = el;
            // Add CSS
            this.wysiwyg.contentDocument.querySelector('head').innerHTML += `<style>
            *, ::after, ::before {box-sizing: border-box;}
            :root {tab-size: 4;}
            html {line-height: 1.15;text-size-adjust: 100%;}
            body {margin: 0px; padding: 1rem 0.5rem;}
            body {font-family: system-ui, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";}
            </style>`;
            this.wysiwyg.contentDocument.body.innerHTML +=
                Data.description;

            // Make editable
            this.wysiwyg.contentDocument.designMode = "on";
        },
        format: function(cmd, param) {
            this.wysiwyg.contentDocument.execCommand(cmd, !1, param||null)
        }
    }
}
function tagSelect() {
  return {
    open: false,
    textInput: '',
    tags: [],
    init() {
      this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
    },
    addTag(tag) {
      tag = tag.trim()
      if (tag != "" && !this.hasTag(tag)) {
        this.tags.push( tag )
        Mytags = this.tags;
        Mytags = Mytags.toString();
      }
      this.clearSearch()
      this.$refs.textInput.focus()
      this.fireTagsUpdateEvent()
    },
    fireTagsUpdateEvent() {
      this.$el.dispatchEvent(new CustomEvent('tags-update', {
        detail: { tags: this.tags },
        bubbles: true,
      }));
    },
    hasTag(tag) {
      var tag = this.tags.find(e => {
        return e.toLowerCase() === tag.toLowerCase()
      })
      return tag != undefined
    },
    removeTag(index) {
      this.tags.splice(index, 1)
      this.fireTagsUpdateEvent()
    },
    search(q) {
      if ( q.includes(",") ) {
        q.split(",").forEach(function(val) {
          this.addTag(val)
        }, this)
      }
      this.toggleSearch()
    },
    clearSearch() {
      this.textInput = ''
      this.toggleSearch()
    },
    toggleSearch() {
      this.open = this.textInput != ''
    }
  }
}


function onImageChange(input){
  if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            
            $('#Pimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }

}

function hoverPic(){
 var input = document.getElementById("hover_img");
   if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#Pimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }else{
      $('#Pimg').attr('src', Data.img);
    }
}

function mainpic(){
var input = document.getElementById("img");
   if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#Pimg').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }else{
      $('#Pimg').attr('src', Data.hover);
    }

    }

function RemPack(val){
 $("#pack_"+val).hide("slow");
 for (var i = 0 ; i < Data.packages.length; i ++){
   if (Data.packages[i].id == val){
    if(Data.packages[i].id < 0 ){
         Data.packages.splice(i, 1);
         break;
   }else{
         Data.packages[i].is_active = false;
         break;
   }
 }
}

}
var count = -1;
function addpack(){
var name = document.getElementById("pack_name").value.trim();
var price = document.getElementById("pack_price").value;
var mult = document.getElementById("multiplier").value;

if (!(name.length > 0)  || (price <= 0))
    return;
$("#pack_name").val("");
$("#pack_price").val("");
var id = count;
count--;
 var temp =  '<tr id="pack_'+id +'" class="text-gray-700 dark:text-gray-400"><td class="px-4 py-3"><div class="flex items-center text-sm"><div><p class="font-semibold">'+name+'</p></div></div></td><td class="px-4 py-3"><div class="flex items-center text-sm"><div><p class="font-semibold">x'+mult+'</p></div></div></td><td class="px-4 py-3 text-sm">'+price+' Rs</td><td class="px-4 py-3"><div class="flex items-center space-x-4 text-sm"> <button button="button" onClick="RemPack('+id+')"class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete"><svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg></button></div></td></tr>';
$("#bodytabel").append(temp);
Data.packages.push({
  id: id,
  name: name,
  price: price,
  multiplier: mult,
  is_active: true
});
}

// $("#activeSwi").change(function(){
//   if (this.checked){
//     Data.is_active = true;
//   }else{
//     Data.is_active = false;
//   }
//   console.log(Data.is_active);
// });
$("#catge").change(function(){
  Data.category = this.value;
});
function a(){
 if (!validateForm())
     return;
     var form_data = new FormData();
      var hover = document.getElementById("hover_img");
      var img = document.getElementById("img");
      if (hover.files && hover.files[0]) {
        form_data.append("hoimg", hover.files[0]);
      }
      if (img.files && img.files[0]) {
        form_data.append("Mimg", img.files[0]);
      }

      Data.packages = JSON.stringify(Data.packages);
      for ( var key in Data ) {
    form_data.append(key, Data[key]);
}

 $.ajax({
    url: "/addupdate/",
    beforeSend: function (xhr) {
            xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
            xhr.setRequestHeader('X-CSRFToken', Data.csrfmiddlewaretoken);
        },
    type: 'post',
    data: form_data ,
    processData: false,
       contentType : false,
    success: function( data, textStatus, jQxhr ){

var confirm = "<h3 style='text-align:center' class='my-6 text-xl font-semibold text-green-700 dark:text-green-100'>Data Successfully Updated</h3>"
var btn = "<button @click='closeModal' class='cemodals w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray'>Ok</button>"
 $("#modal").find('.body').html(confirm);
$("#modal").find("footer").html(btn);
$('#modalbtn').click()

         $( "#mainBox" ).hide().load("products/").show('');
    },
    error: function( jqXhr, textStatus, errorThrown ){
    Data = cacheData;
    var confirm = "<h3 style='text-align:center;color:red' class='my-6 text-xl font-semibold text-orange-600 dark:text-red-600'>"+errorThrown+"</h3>"
var btn = "<button @click='closeModal' class='cemodals w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray'>Ok</button>"
 $("#modal").find('.body').html(confirm);
$("#modal").find("footer").html(btn);
$('#modalbtn').click()

    }
});
}

var cacheData =Data;


function validateForm(){
    Data.category = $("#catge").val();
    cacheData = Data;

  var name = $("#name").val().trim();
  var priority = $("#priority").val().trim();
  var quan = $("#quan").val().trim();
    var errors = "";
  var ifram = document.getElementById('frame');
  var tags = Mytags;
  var packages = Data.packages;
  if (Data.id <=0 ){
        var hover = document.getElementById("hover_img");
      var img = document.getElementById("img");
      if (hover.files && hover.files[0]) {}else{
        errors += "Main image required\n";
      }
      if (img.files && img.files[0]){}else {
        errors += "hover image required\n";
      }
      }

  if(Data.category <0){
    errors += "Category required\n";
  }
  if (name.length < 1)
    errors += "Name is required\n";
  if (quan < 1)
    errors += "Quantity is required\n";
  if (getdescription().length < 1)
    errors += "Description is required\n";
  if (tags.length < 1)
    errors += "Tags is required\n";
   if (packages.length < 1)
    errors += "minimum one Packages is required\n";
  if (errors.length > 0) {
    var confirm = "<h3 style='text-align:center;color:red' class='my-6 text-xl font-semibold text-red-500 dark:text-red-500'>"+errors+"</h3>"
var btn = "<button @click='closeModal' class='cemodals w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray'>Ok</button>"
 $("#modal").find('.body').html(confirm);
$("#modal").find("footer").html(btn);
$('#modalbtn').click()
    return false;
   }
Data.name = name;
Data.priority = priority;
Data.quantity = quan;
Data.description = getdescription();
Data.tags = tags;
return true;


}
































