<div class="after-add-more" id="attribute1">
                            
        <div class="form-group row">
        	<div class="col-md-4">
	            <label class="control-label">Attribute</label>
	            <select class="form-control jsAttribute" id="attribute" name="attribute[1]" required data-msg-required="Please select attribute" >
                    <option value="">--Select Attribute--</option>
                    {{for attribute}}
                            <option value="{{:id}}">{{:attribute_name}}</option>
                    {{/for}}
                </select>
        	</div>
        </div>
        <div class="form-group row">
        	<div class="col-md-4">
	            <label class="control-label">Sub Attribute</label>
	            <select class="form-control jsSubAttribute" id="sub_attribute" name="sub_attribute[1]" required data-msg-required="Please select sub attribute" >
                    <option value="">--Select Sub Attribute--</option> 
                </select>
            </div>
        </div>
        <div class="form-group row">
        	<div class="col-md-4">
            	<label class="control-label">Value</label>
            	<input maxlength="200" type="text" id="value" name="value[1]" class="form-control jsAttributeValue" placeholder="Enter value" required data-msg-required="Please enter value" />
            </div>
        </div>
        <div class="form-group row change">
            <label for="">&nbsp;</label>
            <a class="btn btn-success add-more">+ Add More</a>
        </div>
</div>