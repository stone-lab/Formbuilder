define(function(require) {
  var formname               = require('text!templates/shortcode/formname.html')
  , prependedtext            = require('text!templates/shortcode/prependedtext.html')
  , search                   = require('text!templates/shortcode/searchinput.html')
  , appendedcheckbox         = require('text!templates/shortcode/appendedcheckbox.html')
  , appendedtext             = require('text!templates/shortcode/appendedtext.html')
  , filebutton               = require('text!templates/shortcode/filebutton.html')
  , button                   = require('text!templates/shortcode/button.html')
  , buttondouble             = require('text!templates/shortcode/buttondouble.html')
  , buttondropdown           = require('text!templates/shortcode/buttondropdown.html')
  , multiplecheckboxes       = require('text!templates/shortcode/multiplecheckboxes.html')
  , multiplecheckboxesinline = require('text!templates/shortcode/multiplecheckboxesinline.html')
  , multipleradios           = require('text!templates/shortcode/multipleradios.html')
  , multipleradiosinline     = require('text!templates/shortcode/multipleradiosinline.html')
  , passwordinput            = require('text!templates/shortcode/passwordinput.html')
  , prependedcheckbox        = require('text!templates/shortcode/prependedcheckbox.html')
  , prependedtext            = require('text!templates/shortcode/prependedtext.html')
  , searchinput              = require('text!templates/shortcode/searchinput.html')
  , selectbasic              = require('text!templates/shortcode/selectbasic.html')
  , selectmultiple           = require('text!templates/shortcode/selectmultiple.html')
  , textarea                 = require('text!templates/shortcode/textarea.html')
  , textinput                = require('text!templates/shortcode/textinput.html')
  , emailinput               = require('text!templates/shortcode/emailinput.html')
  , urlinput                 = require('text!templates/shortcode/urlinput.html')
  , telinput                 = require('text!templates/shortcode/telinput.html')
  , numberinput              = require('text!templates/shortcode/numberinput.html')
  , dateinput                = require('text!templates/shortcode/dateinput.html')
  , captchainput             = require('text!templates/shortcode/captchainput.html');

  return {
    formname                   : formname
    , prependedtext            : prependedtext
    , search                   : search
    , textinput                : textinput
    , appendedcheckbox         : appendedcheckbox
    , appendedtext             : appendedtext
    , filebutton               : filebutton
    , singlebutton             : button
    , doublebutton             : buttondouble
    , buttondropdown           : buttondropdown
    , multiplecheckboxes       : multiplecheckboxes
    , multiplecheckboxesinline : multiplecheckboxesinline
    , multipleradios           : multipleradios
    , multipleradiosinline     : multipleradiosinline
    , passwordinput            : passwordinput
    , prependedcheckbox        : prependedcheckbox
    , prependedtext            : prependedtext
    , searchinput              : searchinput
    , selectbasic              : selectbasic
    , selectmultiple           : selectmultiple
    , textarea                 : textarea
    , emailinput               : emailinput
	, urlinput                 : urlinput
	, telinput                 : telinput
	, numberinput              : numberinput
	, dateinput                : dateinput
	, captchainput             : captchainput
  }
});
