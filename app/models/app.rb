class App < ActiveRecord::Base
  attr_accessible :description, :externalLink, :imagePath, :name
end
