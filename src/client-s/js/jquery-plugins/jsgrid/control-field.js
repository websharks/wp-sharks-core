(function ($) {

  jsGrid.fields.control.prototype._initConfig = function () {
    this._hasFiltering = this._grid.filtering;
    this._hasInserting = this._grid.inserting;

    if (this._hasInserting && this.modeSwitchButton && !(this._grid.insertingByDefault || false)) {
      this._grid.inserting = false; // Force false.
    }
    this._configInitialized = true;
  };

  jsGrid.fields.control.prototype._createInsertSwitchButton = function () {
    return this._createOnOffSwitchButton('inserting', this.insertModeButtonClass, this._grid.inserting);
  };

})(jQuery);
