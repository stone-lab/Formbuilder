define([
       "jquery", "underscore", "backbone"
      , "views/temp-snippet"
      , "helper/pubsub"
      , "text!templates/app/renderform.html"
], function(
  $, _, Backbone
  , TempSnippetView
  , PubSub
  , _renderForm
){
  return Backbone.View.extend({
    tagName: "fieldset"
    , initialize: function(options){
	  this.locale	= options.locale;
      this.collection.on("add", this.render, this);
      this.collection.on("remove", this.render, this);
      this.collection.on("change", this.render, this);
      PubSub.on("mySnippetDrag", this.handleSnippetDrag, this);
      PubSub.on("tempMove", this.handleTempMove, this);
      PubSub.on("tempDrop", this.handleTempDrop, this);
      this.$build = $("#build_" + this.locale);
      this.renderForm = _.template(_renderForm);
      this.render();
    }

    , render: function(){
		
			  //Render Snippet Views
			  this.$el.empty();
			  this.$build.find(".target").removeClass("target");
			  var that = this;
			  _.each(this.collection.renderAll(), function(snippet){
				that.$el.append(snippet);
			  });
			  $("#render_" + this.locale).val(that.renderForm({
				text: _.map(this.collection.renderAllClean(), function(e){return e.html()}).join("\n")
			  }));
			  $("#render_shortcode_" + this.locale).val(that.renderForm({
				text: _.map(this.collection.renderAllShortcode(), function(e){return e.html()}).join("\n")
			  }));
			  
			  $("#render_json_" + this.locale).val(JSON.stringify(this.collection.toJSON()));
			  
			  this.$el.appendTo("#build_"  + this.locale + " #target_" + this.locale);
			  this.delegateEvents();
		
    }
    , getBottomAbove: function(eventY){
      var myFormBits = $(this.$el.find(".component"));
      var topelement = _.find(myFormBits, function(renderedSnippet) {
        if (($(renderedSnippet).offset().top + $(renderedSnippet).height()) > eventY  - 90) {
          return true;
        }
        else {
          return false;
        }
      });
      if (topelement){
        return topelement;
      } else {
        return myFormBits[0];
      }
    }

    , handleSnippetDrag: function(mouseEvent, snippetModel) {
		if ($("body > .temp").length == 0){ 
			$("body").append(new TempSnippetView({model: snippetModel}).render());
		}
		this.collection.remove(snippetModel);
		PubSub.trigger("newTempPostRender", mouseEvent);
    }

    , handleTempMove: function(mouseEvent){
      this.$build.find(".target").removeClass("target");
      if(mouseEvent.pageX >= this.$build.offset().left &&
          mouseEvent.pageX < (this.$build.width() + this.$build.offset().left) &&
          mouseEvent.pageY >= this.$build.offset().top &&
          mouseEvent.pageY < (this.$build.height() + this.$build.offset().top)){
        $(this.getBottomAbove(mouseEvent.pageY)).addClass("target");
      } else {
        this.$build.find(".target").removeClass("target");
      }
    }

    , handleTempDrop: function(mouseEvent, model, index){
      if(mouseEvent.pageX >= this.$build.offset().left &&
         mouseEvent.pageX < (this.$build.width() + this.$build.offset().left) &&
         mouseEvent.pageY >= this.$build.offset().top &&
         mouseEvent.pageY < (this.$build.height() + this.$build.offset().top)) {
		if($("#form_render_" + this.locale).val() == $("#form_init_" + this.locale).val())
		{
			var index = this.$build.find(".target").index();
			this.collection.add(model,{at: index+1});
			$("#form_render_" + this.locale).val(1);
		}
		else{
			var number_render		= parseInt($("#form_render_" + this.locale).val());
			number_render			= number_render + 1;
			$("#form_render_" + this.locale).val(number_render);
		}
      } else {
        this.$build.find(".target").removeClass("target");
      }
    }
  })
});
