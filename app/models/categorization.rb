class Categorization < ActiveRecord::Base
  belongs_to :post
  belongs_to :category
  attr_accessible :category_id, :post_id
end
