class Music < ActiveRecord::Base
  set_table_name 'music'
  attr_accessible :description, :externalLink, :imagePath, :name
end
