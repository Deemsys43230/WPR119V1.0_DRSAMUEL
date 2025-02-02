<style type="text/css">
    .ea-rtl-label.ea-rtl-label.ea-rtl-label.ea-rtl-label {
        /*text-align: left;*/
    }
</style>
<script type="text/javascript">
    var ea_ajaxurl = '<?php echo admin_url("admin-ajax.php"); ?>';
</script>
<script type="text/template" id="ea-bootstrap-main">
<div class="ea-bootstrap" style="max-width: <%= settings.width %>;">
    <form class="form-horizontal">
        <% if (settings.layout_cols === '2') { %>
        <div class="col-md-6" style="padding-top: 25px;">
            <% } %>
            <div class="step form-group">
                <div class="block"></div>
                <div class="col-sm-8">
                    <select name="location" data-c="location" class="filter form-control">
                        <?php $this->get_options('locations', $location_id, $service_id, $worker_id) ?>
                    </select>
                </div>
            <label class="ea-label col-sm-4 control-label ea-rtl-label">
                <?php _e($this->options->get_option_value("trans.location"), 'easy-appointments');?>
            </label>
        </div>
        <div class="step form-group">
            <div class="block"></div>
            <div class="col-sm-8">
                <select name="service" data-c="service" class="filter form-control" data-currency="<?php echo $this->options->get_option_value("trans.currency");?>">
                    <?php $this->get_options('services', $location_id, $service_id, $worker_id) ?>
                </select>
            </div>
            <label class="ea-label col-sm-4 control-label ea-rtl-label">
                <?php _e($this->options->get_option_value("trans.service"), ''); ?>
            </label>
        </div>
        <div class="step form-group">
            <div class="block"></div>
            <div class="col-sm-8">
                <select name="worker" data-c="worker" class="filter form-control">
                    <?php $this->get_options('staff', $location_id, $service_id, $worker_id) ?>
                </select>
            </div>
            <label class="ea-label col-sm-4 control-label ea-rtl-label">
                <?php _e($this->options->get_option_value("trans.worker"), ''); ?>
            </label>
        </div>
        <div class="step calendar" class="filter">
            <div class="block"></div>
            <div class="date"></div>
        </div>
        <div class="step" class="filter">
            <div class="block"></div>
            <div class="time"></div>
        </div>
        <% if (settings.layout_cols === '2') { %>
        </div>
        <div class="step final col-md-6">
        <% } else { %>
        <div class="step final">
        <% } %>
            <div class="block"></div>
            <h3><%= settings['trans.personal-informations'] %></h3>
            <small><%= settings['trans.fields'] %></small>

            <% _.each(settings.MetaFields, function(item,key,list) { %>
            <% if (item.visible == "0") { return; } %>
            <div class="form-group">
                <div class="col-sm-8">
                    <% if(item.type === 'INPUT') { %>
                    <input class="form-control custom-field" maxlength="499" type="text" name="<%= item.slug %>" <% if (item.required == "1") { %>data-rule-required="true" data-msg-required="<%= settings['trans.field-required'] %>"<% } %> <% if (item.validation == "email") { %>data-rule-email="true" data-msg-email="<%= settings['trans.error-email'] %>"<% } %>>
                    <% } else if(item.type === 'SELECT') { %>
                        <select class="form-control custom-field" name="<%= item.slug %>" <% if (item.required == "1") { %>aria-required="true" <% if (item.required == "1") { %>data-rule-required="true"<% } %> data-msg-required="<%= settings['trans.field-required'] %>"<% } %>>
                            <% _.each(item.mixed.split(','),function(i,k,l) { %>
                            <% if (i == "-") { %>
                            <option value="">-</option>
                            <% } else { %>
                            <option value="<%= i %>" ><%= i %></option>
                            <% }});%>
                        </select>
                    <% } else if(item.type === 'TEXTAREA') { %>
                        <textarea class="form-control custom-field" rows="3" maxlength="499" style="height: auto;" name="<%= item.slug %>" <% if (item.required == "1") { %>data-rule-required="true" data-msg-required="<%= settings['trans.field-required'] %>"<% } %>></textarea>
                    <% } %>
                </div>
                <label class="col-sm-4 control-label ea-rtl-label"><%= item.label %> <% if (item.required == "1") { %>*<% } %> :</label>
            </div>
            <% });%>
            <h3 id="booking-overview-header"><%= settings['trans.booking-overview'] %></h3>
            <div id="booking-overview"></div>

            <div class="form-group">
                <div class="col-sm-offset-4 col-sm-8 ea-actions-group" style="display: inline-flex;">
                    <?php echo apply_filters('ea_checkout_button', '<button class="ea-btn ea-submit btn btn-primary"><%= settings[\'trans.submit\'] %></button>');?>
                    <button class="ea-btn ea-cancel btn btn-default"><%= settings['trans.cancel'] %></button>
                </div>
            </div>
        </div>
        <% if (settings.layout_cols === '2') { %>
        </div>
        <% } %>
    </form>
</div>
<div id="ea-loader"></div>
</script>