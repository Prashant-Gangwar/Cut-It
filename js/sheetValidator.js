/* =========================================================
 * SheetValidator.JS
 * JQuery plugin to validate sheet-like input table
 * =========================================================
 * Copyright 2016 Sidhant Sharma
 *
 * Licensed under MIT License
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT.  IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 * ========================================================= */

!function( $ ) {

	function setValid($el) {
		$el.removeClass("invalid");
		$("#alertBox").hide();
		return true;
	}

	function setInvalid($el, text, warn) {
		$el.addClass("invalid");
		if (text) {
			$("#alertBox span").text(text);
			if (warn) {
				$("#alertBox").removeClass("alert-danger").addClass("alert-warning");
			} else {
				$("#alertBox").removeClass("alert-warning").addClass("alert-danger");
			}
			$("#alertBox").show();
		}
		return false;
	}

	// Adopted from http://stackoverflow.com/a/276622/5211579
	function isValidDate(date)
	{
	    var matches = /^(\d{1,2})\-(\d{1,2})\-(\d{4})$/.exec(date);
	    if (matches == null) return false;
		var d = matches[1];
	    var m = matches[2] - 1;		// JS Month is 0-based
	    var y = matches[3];
		var tempDate = new Date();
	    var composedDate = new Date(y, m, d);
	    return composedDate.getDate() == d &&
	            composedDate.getMonth() == m &&
	            composedDate.getFullYear() == y;
	}

	function validatePattern(el, strict, warn) {
		var $this = undefined;
		if (typeof(el) != 'undefined')
			$this = $(el);
		else
			$this = $(this);
		// Don't bug the user if field is empty
		if (!strict && (!$this.val() || $this.val().length < 1)) return true;
		var pattern = $this.attr("data-pattern");
		var alertMessage = $this.attr("data-alert-message");
		if (!pattern) return true;
		var regex = new RegExp(pattern, 'i');
		//console.log("Patttern: " + $this.attr("data-pattern") + " " + regex.test($this.val()));
		if (!regex.test($this.val()))
			return setInvalid($this, (alertMessage ? "Please enter a valid " + alertMessage + "." : ''), warn);
		else
			return setValid($this);
	}

	function validateSelect(el) {
		var $this = undefined;
		if (typeof(el) != 'undefined')
			$this = $(el);
		else
			$this = $(this);
		var alertMessage = $this.attr("data-alert-message");
		if (!alertMessage) return;
		if (!$this.val() || $this.val() == "Select" || parseInt($this.val()) == 0)
		 	return setInvalid($this, "Please select " + alertMessage + " from the dropdown menu.");
		else
			return setValid($this);
	}

	function validateDate(el) {
		var $this = undefined;
		if (typeof(el) != 'undefined')
			$this = $(el);
		else
			$this = $(this);
		if (!$this.val() || $this.val().length < 1) return true;
		var dateTo = new Date();
		var dateInput = $this.val();
		if (!isValidDate(dateInput)) {
			return setInvalid($this, "Please select a valid date (in dd-mm-yyyy format)");
		}
 		dateInput = new Date(dateInput.split("-").map(function(i) { return parseInt(i, 10); }).reverse());
		dateTo.setDate(dateTo.getDate() + 1);	// add a day, since JS Date automatically added time
		if (dateInput < dateTo) return setValid($this);
		else return setInvalid($this, "Please select a valid date (uptil today's date).");
	}

	function sheetValidator(options) {
		//console.log(JSON.stringify(options));
		if (options) {
			if (options.validateDate) return validateDate($(this));
			else if (options.validatePattern) return validatePattern($(this), options.strict, options.warn);
			else if (options.validateSelect) return validateSelect($(this));
			else if (options.customValidator && $.isFunction(options.customValidator)) return options.customValidator($(this));
		}
		var children = $(this).find('input');
		$.each(children, function(index, child) {
			if ($(child).attr("data-pattern")) {
				$(child).on("blur", function(ev) {
					validatePattern(ev.target);
				});
				$(child).on("click", function(ev) {
					validatePattern(ev.target);
				});
				if (options && options.onInit) {
					validatePattern($(child));
				}
			}
		});

		// children = $(this).find('select');
		// $.each(children, function(index, child) {
		// 	$(child).on("blur",  function(ev) {
		// 		validateSelect(ev.target);
		// 	});
		// });
	}

	$.fn.sheetValidator = sheetValidator;

}( window.jQuery );
