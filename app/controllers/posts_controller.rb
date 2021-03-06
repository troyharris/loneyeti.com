class PostsController < ApplicationController
	
	http_basic_authenticate_with :name => "tharris", :password => "d3ltac0", :except => [:index, :show]

	def index
	  @posts = Post.all(:order => "created_at DESC")
	  @categories = Category.all(:order => "name")
	end

	def admin
	  @posts = Post.all
	  
	end
	
	def new
	  @categories = Category.all
	end
	
	def create
	  @post = Post.new(params[:post])
	  @category = Category.find(params[:category][:id]);	  
	  @post.categories << @category
	  @post.save
	  
	  redirect_to :action => :show, :id => @post.id
	end

	def show
	  @post = Post.find(params[:id])
	  @categories = Category.all(:order => "name")
	end

	def edit
	  @post = Post.find(params[:id])
	  @categories = Category.all
	end
	
	def update
	  @post = Post.find(params[:id])
	  @category = Category.find(params[:category][:id]);
	  @post.categories << (@category)	  
	  if @post.update_attributes(params[:post])
	    redirect_to :action => :show, :id => @post.id
	  else
	    render 'edit'
	  end
	end

	def destroy
	  @post = Post.find(params[:id])
	  @post.destroy
	  
	  redirect_to :action => :admin
	end
end
