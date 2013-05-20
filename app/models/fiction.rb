class Fiction < ActiveRecord::Base
  set_table_name 'fiction'
  attr_accessible :description, :externalLink, :imagePath, :name
end
