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
    initialize: function(jsonStringFormbuilder, locale){
		
      //Bootstrap tabs from json.
      new TabView({
        title: "Input"
		, locale: locale
        , collection: new SnippetsCollection(JSON.parse(inputJSON))
      });
      new TabView({
        title: "Radios / Checkboxes"
		, locale: locale
        , collection: new SnippetsCollection(JSON.parse(radioJSON))
      });
      new TabView({
        title: "Select"
		, locale: locale
        , collection: new SnippetsCollection(JSON.parse(selectJSON))
      });
      new TabView({
        title: "Buttons"
		, locale: locale
        , collection: new SnippetsCollection(JSON.parse(buttonsJSON))
      });
      /* new TabView({
        title: "Rendered"
		, locale: locale
        , content: renderTab
      }); */
     /*  new TabView({
        title: "About"
        , content: aboutTab
      }); */

      //Make the first tab active!
      $("#components_" + locale + " .tab-pane").first().addClass("active");
      $("#formtabs_" + locale + " li").first().addClass("active");
	  
      // Bootstrap "My Form" with 'Form Name' snippet.
      new MyFormView({
        title: "Original"
        , locale: locale
        , collection: new MyFormSnippetsCollection(jsonStringFormbuilder)
      });
    }
  }
});
