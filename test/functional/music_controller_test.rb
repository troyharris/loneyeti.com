require 'test_helper'

class MusicControllerTest < ActionController::TestCase
  setup do
    @music = music(:one)
  end

  test "should get index" do
    get :index
    assert_response :success
    assert_not_nil assigns(:music)
  end

  test "should get new" do
    get :new
    assert_response :success
  end

  test "should create music" do
    assert_difference('Music.count') do
      post :create, music: { description: @music.description, externalLink: @music.externalLink, imagePath: @music.imagePath, name: @music.name }
    end

    assert_redirected_to music_path(assigns(:music))
  end

  test "should show music" do
    get :show, id: @music
    assert_response :success
  end

  test "should get edit" do
    get :edit, id: @music
    assert_response :success
  end

  test "should update music" do
    put :update, id: @music, music: { description: @music.description, externalLink: @music.externalLink, imagePath: @music.imagePath, name: @music.name }
    assert_redirected_to music_path(assigns(:music))
  end

  test "should destroy music" do
    assert_difference('Music.count', -1) do
      delete :destroy, id: @music
    end

    assert_redirected_to music_index_path
  end
end
