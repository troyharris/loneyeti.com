class CreateFiction < ActiveRecord::Migration
  def change
    create_table :fiction do |t|
      t.string :name
      t.text :description
      t.string :imagePath
      t.string :externalLink

      t.timestamps
    end
  end
end
