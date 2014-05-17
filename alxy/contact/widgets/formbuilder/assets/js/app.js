define([
       "jquery" , "underscore" , "backbone" 
       , "collections/snippets" , "collections/my-form-snippets"
       , "views/tab" , "views/my-form"
       , "text!data/input.json", "text!data/radio.json", "text!data/select.json", "text!data/buttons.json"
       , "text!templates/app/render.html",  "text!templates/app/about.html", 
], function(
  $, _, Backbone
  , SnippetsCollection, MyFormSnippetsCollection
  , TabView, MyFormView
  , inputJSON, radioJSON, selectJSON, buttonsJSON
  , renderTab, aboutTab
){
  return {
    initialize: function(){

      //Bootstrap tabs from json.
      new TabView({
        title: "Input"
        , collection: new SnippetsCollection(JSON.parse(inputJSON))
      });
      new TabView({
        title: "Radios / Checkboxes"
        , collection: new SnippetsCollection(JSON.parse(radioJSON))
      });
      new TabView({
        title: "Select"
        , collection: new SnippetsCollection(JSON.parse(selectJSON))
      });
      new TabView({
        title: "Buttons"
       , collection: new SnippetsCollection(JSON.parse(buttonsJSON))
     });
      new TabView({
        title: "Rendered"
        , content: renderTab
      });
       new TabView({
         title: "About"
         , content: aboutTab
       });

      $.ajax({
        type:"POST",
        beforeSend: function (request)
        {
            request.setRequestHeader("X-OCTOBER-REQUEST-HANDLER", "formForm::onGetJsonForm");
        },
        url: window.location.pathname,
        success: function(msg) {
            new MyFormView({
              title: "Original"
              , collection: new MyFormSnippetsCollection(jQuery.parseJSON(msg.result))
            });
        }
      });

      //Make the first tab active!
      $("#components .tab-pane").first().addClass("active");
      $("#formtabs li").first().addClass("active");

    }
  }
});
