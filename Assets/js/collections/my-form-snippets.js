define([
       "jquery" , "underscore" , "backbone"
       , "models/snippet"
       , "collections/snippets" 
       , "views/my-form-snippet"
       , "views/my-form-shortcode"
], function(
  $, _, Backbone
  , SnippetModel
  , SnippetsCollection
  , MyFormSnippetView
  , MyFormShortcodeView
){
  return SnippetsCollection.extend({
    model: SnippetModel
    , renderAll: function(){
      return this.map(function(snippet){
        return new MyFormSnippetView({model: snippet}).render(true);
      })
    }
    , renderAllClean: function(){
      return this.map(function(snippet){
        return new MyFormSnippetView({model: snippet}).render(false);
      });
    }
    , renderAllShortcode: function(){
      return this.map(function(snippet){
        return new MyFormShortcodeView({model: snippet}).render(false);
      });
    }
  });
});
