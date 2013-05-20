class Post < ActiveRecord::Base
  has_many :categorizations
  has_many :categories, :through => :categorizations
  attr_accessible :text, :title
  def to_param
    "#{id} #{title}".parameterize
  end
end
