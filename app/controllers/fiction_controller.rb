class FictionController < ApplicationController
  http_basic_authenticate_with :name => "tharris", :password => "d3ltac0", :except => [:index]
  
  # GET /fiction
  # GET /fiction.json
  def index
    @fiction = Fiction.all

    respond_to do |format|
      format.html # index.html.erb
      format.json { render json: @fiction }
    end
  end

  # GET /fiction/1
  # GET /fiction/1.json
  def show
    @fiction = Fiction.find(params[:id])

    respond_to do |format|
      format.html # show.html.erb
      format.json { render json: @fiction }
    end
  end

  # GET /fiction/new
  # GET /fiction/new.json
  def new
    @fiction = Fiction.new

    respond_to do |format|
      format.html # new.html.erb
      format.json { render json: @fiction }
    end
  end

  # GET /fiction/1/edit
  def edit
    @fiction = Fiction.find(params[:id])
  end

  # POST /fiction
  # POST /fiction.json
  def create
    @fiction = Fiction.new(params[:fiction])

    respond_to do |format|
      if @fiction.save
        format.html { redirect_to @fiction, notice: 'Fiction was successfully created.' }
        format.json { render json: @fiction, status: :created, location: @fiction }
      else
        format.html { render action: "new" }
        format.json { render json: @fiction.errors, status: :unprocessable_entity }
      end
    end
  end

  # PUT /fiction/1
  # PUT /fiction/1.json
  def update
    @fiction = Fiction.find(params[:id])

    respond_to do |format|
      if @fiction.update_attributes(params[:fiction])
        format.html { redirect_to @fiction, notice: 'Fiction was successfully updated.' }
        format.json { head :no_content }
      else
        format.html { render action: "edit" }
        format.json { render json: @fiction.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /fiction/1
  # DELETE /fiction/1.json
  def destroy
    @fiction = Fiction.find(params[:id])
    @fiction.destroy

    respond_to do |format|
      format.html { redirect_to fiction_index_url }
      format.json { head :no_content }
    end
  end
end
